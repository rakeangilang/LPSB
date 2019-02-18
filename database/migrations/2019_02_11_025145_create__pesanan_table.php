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
            $table->bigIncrements('IDPesanan');
            $table->integer('IDPelanggan');
            $table->integer('NoPesanan');
            $table->timestamp('DiterimaTgl')->nullable(true);
            $table->timestamp('SelesaiTgl')->nullable(true);
            $table->boolean('Percepatan')->default(false);
            $table->string('Keterangan')->nullable(true);
            $table->boolean('KembalikanSampel')->default(false);
            $table->bigInteger('TotalHarga');
            $table->timestamp('WaktuPemesanan')->nullable(true);
            $table->string('Ulasan')->nullable(true);
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
