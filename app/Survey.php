<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $table = 'survey';
    protected $primaryKey = 'IDPesanan';
    protected $guarded = [];

    public $timestamps = false;
}
