<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable{
    protected $table = "User";
    protected $primaryKey = "userid";
	public $incrementing = true;
	public $timestamps = false;
    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    public function transactions(){
    	return $this->hasMany('App\Transaction','transactionid','transactionid');
    }
}
