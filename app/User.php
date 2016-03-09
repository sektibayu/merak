<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Session;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "userid";
    protected $table = "user";
    protected $fillable = [
        'name', 'username', 'password',
    ];

    public $timestamps = false;
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];
}
