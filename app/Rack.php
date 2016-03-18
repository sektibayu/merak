<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $table = 'rack';
    protected $primaryKey = 'rackid';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = array(
        'code',
        'enabled',
    );
    public function items(){
    	return $this->hasMany('App\Item', 'rackid', 'rackid');
    }
}
