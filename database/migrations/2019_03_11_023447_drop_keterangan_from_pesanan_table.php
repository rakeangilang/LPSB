<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropKeteranganFromPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->dropColumn('Keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesanan', function (Blueprint $table) {
            //
            $table->string('Keterangan')->nullable();
        });
    }
}
