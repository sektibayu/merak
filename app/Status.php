<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	protected $table = "status";
    protected $primaryKey = "statusid";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
    	'desc'
    ];
}
