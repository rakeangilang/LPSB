<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrasiPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AdministrasiPesanan', function (Blueprint $table) {
            $table->bigIncrements('IDPesanan');
            $table->string('NamaLengkap');
            $table->string('Institusi');
            $table->string('Alamat');
            $table->string('NoHP');
            $table->string('Email');
            $table->string('NoNPWP');
            $table->text('PenerimaSampel')->nullable(true);
            $table->string('Jabatan')->nullable(true);
            $table->string('NamaRekening');
            $table->string('NamaBank');
            $table->string('NoRekening');
            $table->boolean('VerifikasiPembayaran')->default(0);
            $table->string('CatatanPembatalan')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('AdministrasiPesanan');
    }
}
