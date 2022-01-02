<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_vaccines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->bigInteger('childID')->unsigned();
            $table->bigInteger('vacID')->unsigned();
            $table->string('missing_dose');
            $table->string('phone','11');
            $table->string('hospital_name');
            $table->float('dose_fee',10,2)->nullable();
            $table->string('pay_by')->nullable();
            $table->string('takenDate')->nullable();
            $table->string('transaction_number')->nullable();
            $table->string('account_number')->nullable();
            $table->string('invoice_number')->nullable();
            $table->foreign('userID')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('childID')->on('child_registrations')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vacID')->on('vaccines')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('missing_vaccines');
    }
}
