<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPelacakan extends Model
{
    //
    protected $table = 'statuspelacakan';
    protected $primaryKey = 'IDStatus';
    protected $guarded = [];

    public $timestamps = false;
}
