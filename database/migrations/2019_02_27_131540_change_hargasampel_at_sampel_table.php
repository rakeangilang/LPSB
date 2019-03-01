<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeHargasampelAtSampelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sampel', function (Blueprint $table) {
            //
            $table->bigInteger('HargaSampel')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampel', function (Blueprint $table) {
            //
            $table->string('HargaSampel')->change();
        });
    }
}
