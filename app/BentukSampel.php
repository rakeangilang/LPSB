<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BentukSampel extends Model
{
    //
    protected $table = 'bentuksampel';
    protected $primaryKey = null;
    public $incrementing = true;
    protected $guarded = [];
    public $timestamps = false;


    public function Katalog(){
    	return $this->belongsTo('App\Katalog', 'IDKatalog', 'IDKatalog');
    }
}
