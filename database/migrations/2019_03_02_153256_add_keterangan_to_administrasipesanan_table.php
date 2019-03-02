<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeteranganToAdministrasipesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administrasipesanan', function (Blueprint $table) {
            //
            $table->string('KeteranganPesanan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administrasipesanan', function (Blueprint $table) {
            //
            $table->dropColumn('KeteranganPesanan');
        });
    }
}
