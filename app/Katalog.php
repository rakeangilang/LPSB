<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    //
    protected $table = 'katalog';
    protected $primaryKey = 'IDKatalog';
    protected $guarded = ['DitambahkanPada'];

    public $nama_kategori = 'a';

    const CREATED_AT = 'DitambahkanPada';
    const UPDATED_AT = 'DiupdatePada';

    public function BentukSampel(){
    	return $this->hasOne('App\BentukSampel', 'IDKatalog', 'IDKatalog');
    }

    public function Kategori(){
    	return $this->belongsTo('App\Kategori', 'IDKategori', 'IDKategori');
    }

    public function Keranjang(){
        return $this->hasMany('App\Keranjang', 'IDKatalog', 'IDKatalog');
    }

}
