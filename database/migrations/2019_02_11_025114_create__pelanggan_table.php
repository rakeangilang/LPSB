<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pelanggan', function (Blueprint $table) {
            $table->increments('IDPelanggan');
            $table->string('Email');
            $table->string('Password');
            $table->string('Nama');
            $table->string('Perusahaan')->nullable(true);
            $table->string('Alamat')->nullable(true);
            $table->string('NoHP')->nullable(true);
            $table->string('NoIdentitas')->nullable(true);
            $table->string('NamaRekening')->nullable(true);
            $table->text('NamaBank')->nullable(true);
            $table->string('NoRekening')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pelanggan');
    }
}
