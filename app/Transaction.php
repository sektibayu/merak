<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'transactionid';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = array(
        'time',
        'userid',
        'statusid',
    );
}
