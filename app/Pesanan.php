<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    //
    protected $table = 'pesanan';
    protected $primaryKey = 'IDPesanan';
    protected $guarded = ['IDPesanan', 'IDPelanggan', 'WaktuPemesanan'];

    const CREATED_AT = 'WaktuPemesanan';
    const UPDATED_AT = null;

    public function Pelanggan(){
    	return $this->belongsTo('App\Pelanggan', 'IDPelanggan', 'IDPelanggan');
    }
}
