<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table="Transaction";
    protected $primaryKey="transactionid";
    public $timestamps=false;
    protected $fillable=[
    'time',
    'userid',
    'statusid'
    ];
    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function status(){
    	return $this->hasOne(Status::class);
    }
}
