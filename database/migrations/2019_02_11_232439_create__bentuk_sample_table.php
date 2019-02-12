<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBentukSampleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BentukSample', function (Blueprint $table) {
            $table->integer('IDKatalog');
            $table->boolean('Ekstrak');
            $table->boolean('Cairan');
            $table->boolean('Serbuk');
            $table->boolean('Simplisia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BentukSample');
    }
}
