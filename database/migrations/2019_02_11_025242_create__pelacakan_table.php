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
            $table->bigIncrements('IDPesanan');
            $table->integer('IDStatus');
            $table->boolean('KirimSertifikat')->default(0);
            $table->boolean('SisaDiterima')->default(0);
            $table->boolean('SertifikatDiterima')->default(0);
            $table->timestamp('UpdateTerakhir');
            $table->timestamp('WaktuPembayaran')->nullable(true);
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
