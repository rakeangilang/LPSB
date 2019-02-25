<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    //
    protected $table = 'Keranjang';
    protected $primaryKey = 'IDItem';
    protected $guarded = ['IDItem'];
    public $timestamps = false;

    public function Pelanggan(){
        return $this->belongsTo('App\User', 'IDPelanggan', 'IDPelanggan');
    }
}
