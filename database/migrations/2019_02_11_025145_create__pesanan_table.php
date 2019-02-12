<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pesanan', function (Blueprint $table) {
            $table->increments('IDPesanan');
            $table->integer('IDPelanggan');
            $table->integer('NoPesanan');
            $table->timestamp('DiterimaTgl')->nullable(true);
            $table->timestamp('SelesaiTgl')->nullable(true);
            $table->boolean('Asal');
            $table->boolean('Percepatan')->default(false);
            $table->string('Keterangan')->nullable(true);
            $table->boolean('KembalikanSampel')->default(false);
            $table->bigInteger('TotalBiaya');
            $table->string('BuktiPengiriman')->nullable(true);
            $table->string('BuktiPembayaran')->nullable(true);
            $table->string('Ulasan')->nullable(true);
            $table->timestamp('WaktuPemesanan')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pesanan');
    }
}
