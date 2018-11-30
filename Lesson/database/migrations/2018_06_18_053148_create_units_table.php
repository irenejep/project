<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('units_id');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->integer('lesson_id')->unsigned()->unique;
            $table->foreign('lecturer_id')->references('lecturer_id')->on('lecturers');
            $table->integer('lecturer_id')->unsigned();
            $table->string('units_name');
            $table->integer('units_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
