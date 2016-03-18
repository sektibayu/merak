<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "User";
    protected $primaryKey = "userid";
	public $incrementing = true;
	public $timestamps = false;
    protected $fillable = [
        'name',
        'username',
        'password'
    ];

    public function transactions(){
    	return $this->hasMany('App\Transaction','transactionid','transactionid');
    }
}
