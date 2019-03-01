<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministrasiPesanan extends Model
{
    //
    protected $table = 'administrasipesanan';
    protected $primaryKey = 'IDPesanan';
    protected $guarded = [];

    public $timestamps = false;
}
