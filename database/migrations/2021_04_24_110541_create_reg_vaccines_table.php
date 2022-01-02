<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_vaccines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('child_id')->unsigned();
            $table->bigInteger('vaccine_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('dose_taken')->nullable();
            $table->string('taken_date')->nullable();
            $table->string('status');
            $table->foreign('child_id')->references('id')->on('child_registrations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('reg_vaccines');
    }
}
