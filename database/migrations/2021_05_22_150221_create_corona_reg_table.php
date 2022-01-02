<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoronaRegTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corona_regs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->bigInteger('vacID')->unsigned();
            $table->string('fullName');
            $table->string('phone');
            $table->string('nid','16');
            $table->string('bod');
            $table->string('hospital');
            $table->string('address');
            $table->string('takenDate')->nullable();
            $table->string('dosetaken')->nullable();
            $table->string('status');
            $table->foreign('userID')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vacID')->on('corona_vaccine')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('corona_regs');
    }
}
