<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Katalog', function (Blueprint $table) {
            $table->increments('IDKatalog');
            $table->integer('IDKategori');
            $table->string('JenisAnalisis');
            $table->bigInteger('HargaIPB');
            $table->bigInteger('HargaNONIPB');
            $table->string('Metode');
            $table->string('Keterangan')->nullable(true);
            $table->boolean('StatusAktif')->default(1);
            $table->timestamp('DitambahkanPada')->nullable(true);
            $table->timestamp('DiupdatePada')->nullable(true);
            $table->string('FotoKatalog')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Katalog');
    }
}
