<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sampel extends Model
{
    //
    protected $table = 'sampel';
    protected $primaryKey = 'IDSampel';
    protected $guarded = ['IDSampel'];

    public $timestamps = false;
}
