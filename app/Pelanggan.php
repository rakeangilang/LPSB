<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggan';
    protected $primaryKey = 'IDPelanggan';
    protected $guarded = ['IDPelanggan', 'api_token'];
    public $timestamps = false;

    public function Pesanan(){
    	return $this->hasMany('App\Pesanan', 'IDPelanggan', 'IDPelanggan');
    }
}
