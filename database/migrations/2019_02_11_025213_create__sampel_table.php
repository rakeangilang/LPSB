<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sampel', function (Blueprint $table) {
            $table->integer('IDPesanan');
            $table->integer('NoSampel')->nullable(true);
            $table->string('JenisSampel');
            $table->string('Kemasan');
            $table->integer('Jumlah');
            $table->string('JenisAnalisis');
            $table->string('ListHargaSampel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sampel');
    }
}
