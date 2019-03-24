<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->bigIncrements('IDPesanan');
            $table->tinyInteger('Survey1')->nullable();
            $table->tinyInteger('Survey2')->nullable();
            $table->tinyInteger('Survey3')->nullable();
            $table->tinyInteger('Survey4')->nullable();
            $table->tinyInteger('Survey5')->nullable();
            $table->tinyInteger('Survey6')->nullable();
            $table->tinyInteger('Survey7')->nullable();
            $table->tinyInteger('Survey8')->nullable();
            $table->tinyInteger('Survey9')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey');
    }
}
