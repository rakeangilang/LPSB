<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->bigIncrements('IDItem');
            $table->integer('IDPelanggan');
            $table->string('JenisSampel');
            $table->text('BentukSampel');
            $table->string('Kemasan');
            $table->integer('Jumlah');
            $table->string('JenisMetodeAnalisis');
            $table->bigInteger('HargaSampel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
