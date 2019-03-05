<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRekeningsAtAdministrasipesananTable extends Migration
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
            $table->string('NamaRekening')->nullable()->change();
            $table->string('NamaBank')->nullable()->change();
            $table->string('NoRekening')->nullable()->change();
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
            $table->string('NamaRekening')->nullable(false)->change();
            $table->string('NamaBank')->nullable(false)->change();
            $table->string('NoRekening')->nullable(false)->change();
        });
    }
}
