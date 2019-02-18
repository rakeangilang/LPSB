<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemberitahuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pemberitahuan', function (Blueprint $table) {
            $table->bigIncrements('IDPemberitahuan');
            $table->bigInteger('IDPesanan');
            $table->integer('IDStatus');
            $table->boolean('Dilihat')->default(0);
            $table->timestamp('DimulaiPada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pemberitahuan');
    }
}
