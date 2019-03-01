<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenPesanan extends Model
{
    //
    protected $table = 'dokumenpesanan';
    protected $primaryKey = 'IDPesanan';
    protected $guarded = [];

    public $timestamps = false;
}
