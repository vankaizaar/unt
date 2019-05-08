<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'dob',
        'location',
        'bio',
        'telephone',        
        'avatar',
        'avatar_status',
    ];

    /**
     * Protected date fields for a Profile.
     *
     * @var array
     */

    protected $dates = [
        'created_at',
        'updated_at',
        'dob'
    ];
   
    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
   
}
