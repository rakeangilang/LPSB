<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteInforekeningAtPelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
            $table->dropColumn('NamaRekening');
            $table->dropColumn('NamaBank');
            $table->dropColumn('NoRekening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelanggan', function (Blueprint $table) {
            //
            $table->varchar('NamaRekening')->nullable();
            $table->string('NamaBank')->nullable();
            $table->varchar('NoRekening')->nullable();
        });
    }
}
