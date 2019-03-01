<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdsampelAndMetodeAtSampelTable extends Migration
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
            $table->bigIncrements('IDSampel')->after('IDPesanan');
            $table->string('Metode')->after('JenisAnalisis');
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
            $table->dropColumn('IDSampel');
            $table->dropColumn('Metode');
        });
    }
}
