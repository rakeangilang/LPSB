<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBentukSampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BentukSampel', function (Blueprint $table) {
            $table->increments('IDKatalog');
            $table->boolean('Ekstrak')->default(0);
            $table->boolean('Simplisia')->default(0);
            $table->boolean('Cairan')->default(0);
            $table->boolean('Serbuk')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('BentukSampel');
    }
}
