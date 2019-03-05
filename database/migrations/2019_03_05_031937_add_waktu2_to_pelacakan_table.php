<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWaktu2ToPelacakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelacakan', function (Blueprint $table) {
            //
            $table->dateTime('WaktuKirimSampel')->nullable();
            $table->dateTime('WaktuTerimaSisa')->nullable();
            $table->dateTime('WaktuTerimaSertif')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelacakan', function (Blueprint $table) {
            //
            $table->dropColumn('WaktuKirimSampel');
            $table->dropColumn('WaktuTerimaSisa');
            $table->dropColumn('WaktuTerimaSertif');
        });
    }
}
