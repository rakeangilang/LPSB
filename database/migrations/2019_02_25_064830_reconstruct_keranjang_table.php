<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReconstructKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            //
            $table->dropColumn('JenisMetodeAnalisis');
            $table->dropColumn('HargaSampel');
            $table->integer('IDKatalog')->after('IDPelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keranjang', function (Blueprint $table) {
            //
        });
    }
}
