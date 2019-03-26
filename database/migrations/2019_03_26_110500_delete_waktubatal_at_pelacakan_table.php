<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteWaktubatalAtPelacakanTable extends Migration
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
            $table->dropColumn('WaktuBatal');
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
            $table->nullableTimestamps();
        });
    }
}
