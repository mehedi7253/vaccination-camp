<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_vaccines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vaccineID')->unsigned();
            $table->bigInteger('hospitalID')->unsigned();
            $table->foreign('vaccineID')->on('vaccines')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('hospitalID')->on('hospitals')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hospital_vaccines');
    }
}
