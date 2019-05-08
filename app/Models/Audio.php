<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'audios';

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
        'entry', 
//        'user_id',
    ];

    /**
     * Protected date fields for a Profile.
     *
     * @var array
     */

    protected $dates = [
        'created_at',
        'updated_at'        
    ];


    /**
     * An audio belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
