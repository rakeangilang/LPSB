<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    //
    protected $table = 'pemberitahuan';
    protected $primaryKey = 'IDPemberitahuan';
    protected $guarded = [];

    public $timestamps = false;
}
