<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = "item";
    protected $primaryKey = "itemid";
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
    	'rackid',
    	'name',
        'no_part',
    	'price',
    	'spec',
    	'stock',
    	'pieces'
    ];
}
