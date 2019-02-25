<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    //
    protected $table = 'keranjang';
    protected $primaryKey = 'IDItem';
    protected $guarded = ['IDItem'];
    public $timestamps = false;

    public function Pelanggan(){
        return $this->belongsTo('App\User', 'IDPelanggan', 'IDPelanggan');
    }

	public function Katalog(){
        return $this->belongsTo('App\Katalog', 'IDKatalog', 'IDKatalog');
    }    

}
