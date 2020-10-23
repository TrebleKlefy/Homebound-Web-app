<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('ccv')->nullable();
            $table->string('full_name')->nullable();
            $table->string('card_number')->nullable();
            $table->double("amount")->nullable();
            $table->date('experation_date')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('advertvertisment_id')->nullable();
           
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
