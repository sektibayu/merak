<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "User";
    protected $primaryKey = "userid";

    protected $fillable = [
        'name',
        'username',
        'password'
    ];

    public $timestamps = false;
}
