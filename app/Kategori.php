<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = null;
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = false;

    public function Katalog(){
    	return $this->hasMany('App\Katalog','IDKatalog','IDKatalog');
    }
}
