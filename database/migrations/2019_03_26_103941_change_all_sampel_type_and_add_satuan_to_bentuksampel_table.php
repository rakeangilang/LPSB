<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAllSampelTypeAndAddSatuanToBentuksampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bentuksampel', function (Blueprint $table) {
            //
            $table->integer('Ekstrak')->nullable()->default(null)->change();
            $table->integer('Simplisia')->nullable()->default(null)->change();
            $table->integer('Cairan')->nullable()->default(null)->change();
            $table->integer('Serbuk')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bentuksampel', function (Blueprint $table) {
            //
            $table->boolean('Ekstrak')->default(0)->change;
            $table->boolean('Simplisia')->default(0)->change;
            $table->boolean('Cairan')->default(0)->change;
            $table->boolean('Serbuk')->default(0)->change;
        });
    }
}
