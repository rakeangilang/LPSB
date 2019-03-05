<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdpelangganToPemberitahuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemberitahuan', function (Blueprint $table) {
            //
            $table->integer('IDPelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemberitahuan', function (Blueprint $table) {
            //
            $table->dropColumn('IDPelanggan');
        });
    }
}
