<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DokumenPesanan', function (Blueprint $table) {
            $table->bigIncrements('IDPesanan');
            $table->string('BuktiPengiriman')->nullable(true);
            $table->string('BuktiPembayaran')->nullable(true);
            $table->string('PermohonanAnalisis')->nullable(true);
            $table->string('TandaTerimaSampel')->nullable(true);
            $table->string('Sertifikat')->nullable(true);
            $table->timestamp('UpdateTerakhir')->nullable(true);
            $table->string('BuktiPengembalianSampel')->nullable(true);
            $table->string('BuktiPengembalianUang')->nullable(true);
            $table->string('BuktiPengirimanSertifikat')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DokumenPesanan');
    }
}
