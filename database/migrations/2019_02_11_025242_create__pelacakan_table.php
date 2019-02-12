<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelacakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pelacakan', function (Blueprint $table) {
            $table->integer('IDPesanan');
            $table->integer('IDStatus');
            $table->boolean('KirimSertifikat');
            $table->boolean('SisaDiterima');
            $table->boolean('SertifikatDiterima');
            $table->timestamp('UpdateTerakhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pelacakan');
    }
}
