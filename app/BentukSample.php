<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BentukSample extends Model
{
    //
    protected $table = 'BentukSample';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $guarded = [];
    public $timestamps = false;


    public function Katalog(){
    	return $this->belongsTo('App\Katalog', 'IDKatalog', 'IDKatalog');
    }
}
