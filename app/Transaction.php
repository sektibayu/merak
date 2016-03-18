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
    'itemid',
    'inout',
    'statusid',
    'tmp_stock'
    ];
    public function user(){
    	return $this->belongsTo('App\User','userid','userid');
    }
    public function status(){
    	return $this->belongsTo('App\Status','statusid','statusid');
    }
    public function item(){
        return $this->hasOne('App\Item','itemid','itemid');
    }
}
