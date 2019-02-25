<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pelanggan';
    protected $primaryKey = 'IDPelanggan';
    protected $guarded = [
        'IDPelanggan'
    ];
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->Password;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password'
    ];

    public function Pesanan(){
        return $this->hasMany('App\Pesanan', 'IDPelanggan', 'IDPelanggan');
    }

    public function Keranjang(){
        return $this->hasOne('App\Keranjang', 'IDPelanggan', 'IDPelanggan');
    }
}
