<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table="Transaction";
    protected $primaryKey="transactionid";
    public $incrementing = true;
    public $timestamps=false;
    protected $fillable=[
    'time',
    'userid',
    'statusid'
    ];
}
