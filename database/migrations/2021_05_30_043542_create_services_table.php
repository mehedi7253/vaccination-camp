<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userID')->unsigned();
            $table->bigInteger('childID')->unsigned();
            $table->bigInteger('vacID')->unsigned();
            $table->string('dose_number');
            $table->string('phone','11');
            $table->text('address');
            $table->float('fee',10,2)->nullable();
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
        Schema::dropIfExists('services');
    }
}
