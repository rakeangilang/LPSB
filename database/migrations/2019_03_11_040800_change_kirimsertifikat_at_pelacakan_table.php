<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeKirimsertifikatAtPelacakanTable extends Migration
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
            $table->boolean('KirimSertifikat')->default(0)->change();
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
            $table->boolean('KirimSertifikat')->default(1)->change();
        });
    }
}
