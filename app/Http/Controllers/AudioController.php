<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notifications\SendEntryEmail;
use App\Traits\CaptureIpTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use jeremykenedy\Uuid\Uuid;
use Validator;

class AudioController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function getUserByUsername($username) {
        return User::with('audio')->wherename($username)->firstOrFail();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Get Current logged in user; this should be refactored
        try {
            $id = Auth::user()->id;
            $user = Auth::user()::with('audio')->whereid($id)->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        $data = [
            'user' => $user,
        ];

        return view('audio.show')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        try {
            $user = Auth::user()::with('audio')->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }


        $data = [
            'user' => $user,
        ];
        return view('audio.edit')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $currentUserID = Auth::user()->id;
        $count = Audio::where(['user_id' => $currentUserID])->count();

        if ($count < 3) {
            if (Input::hasFile('file')) {
                $currentUser = Auth::user();
                $entry = Input::file('file');
                $filename = md5($entry->getClientOriginalName() . microtime()) . '.' . $entry->getClientOriginalExtension();
                $save_path = storage_path() . '/users/id/' . $currentUser->id . '/uploads/audio/entries/';
                $path = $save_path . $filename;
                $public_path = '/audio/entry/' . $currentUser->id . '/entries/' . $filename;

                // Make the user a folder and set permissions
                File::makeDirectory($save_path, $mode = 0755, true, true);

                // Save the file to the server            
                File::put($path, file_get_contents($entry->getRealPath()));


                // Save the public entry path to database
                $currentUser->audio()->create([
                    'user_id' => $currentUser->id,
                    'entry' => $public_path
                ]);
                if ($count === 0) {
                    $currentUser->notify(new SendEntryEmail());
                }
                return response()->json('File uploaded.', 200);
            } else {
                return response()->json('There was an error uploading your file. Please try again.', 500);
            }
        } else {
            return response()->json('You have reached the maximum number of entries allowed.', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio) {
        $save_path = storage_path() . '/users/id/' . $audio->user_id . '/uploads/audio/entries/';
        $audioFile = $save_path . basename($audio->entry);
        if (File::exists($audioFile)) {
            File::delete($audioFile);
            $audio->delete();
            return redirect()->back()->with('success', trans('audio.deleteAudioTitle'));
        } else {
            return redirect()->back()->with('error', trans('audio.deleteAudioError'));
        }
    }

    /**
     * Show user audio files.
     *
     * @param $id
     * @param $image
     *
     * @return string
     */
    public function userEntryAudio($id, $entry) {

        $path = storage_path() . '/users/id/' . $id . '/uploads/audio/entries/' . $entry;

        $file = File::get($path);
        $type = File::mimeType($path);

        if (!File::exists($path)) {
            abort(404);
        }


        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

}
