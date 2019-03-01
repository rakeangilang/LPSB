<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelacakan extends Model
{
    //
    protected $table = 'pelacakan';
    protected $primaryKey = 'IDPesanan';
    protected $guarded = [];

    const CREATED_AT = 'UpdateTerakhir';
    const UPDATED_AT = 'UpdateTerakhir';
}
