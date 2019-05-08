@extends('layouts.app')

@section('template_title')
{{ trans('messages.templateTitle') }}
@endsection

@section('template_fastload_css')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

                    {{ trans('messages.showCreateMessagesTitle') }}

                </div>
                <div class="panel-body">
                    <h1>Create a new message</h1>
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <!-- Subject Form Input -->
                            <div class="form-group">
                                <label class="control-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                       value="{{ old('subject') }}">
                            </div>

                            <!-- Message Form Input -->
                            <div class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                            </div>

                            @if($users->count() > 0)
                            <div class="checkbox">
                                @foreach($users as $user)
                                <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                        value="{{ $user->id }}">{!!$user->name!!}</label>
                                @endforeach
                            </div>
                            @endif

                            <!-- Submit Form Input -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_scripts')

@endsection

