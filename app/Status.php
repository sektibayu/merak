<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "Status";
    protected $primaryKey = "statusid";
    protected $fillable = ['desc'];

    public $timestamps = false;
}
