<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    //
    protected $table = 'katalog';
    protected $primaryKey = 'IDKatalog';
    protected $guarded = ['IDKatalog', 'DitambahkanPada'];

    const CREATED_AT = 'DitambahkanPada';
    const UPDATED_AT = 'DiupdatePada';

    public function BentukSample(){
    	return $this->hasOne('App\BentukSample', 'IDKatalog', 'IDKatalog');
    }

    public function Kategori(){
    	return $this->belongsTo('App\Kategori', 'IDKategori', 'IDKategori');
    }
}
