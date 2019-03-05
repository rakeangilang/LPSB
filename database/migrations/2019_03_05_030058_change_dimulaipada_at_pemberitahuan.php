<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDimulaipadaAtPemberitahuan extends Migration
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
            $table->renameColumn('DimulaiPada', 'WaktuPemberitahuan');
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
            $table->renameColumn('WaktuPemberitahuan', 'DimulaiPada');
        });
    }
}
