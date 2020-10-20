<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertismentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('rooms')->nullable();;
            $table->integer('bath_rooms')->nullable();;
            $table->integer('kitchen_rooms')->nullable();;
            $table->string('street')->nullable();;
            $table->string('apartment_number')->nullable();
            $table->string('amenity')->nullable();
            $table->string('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('contract')->nullable();
            $table->string('buildingtype')->nullable();
            $table->string('price')->nullable();
            $table->string('parish')->default("Manchester");
            $table->string('photo_name')->nullable();
            $table->string('photo_description')->nullable();
            $table->string('images')->nullable();
            $table->integer('user_id');
            $table->boolean("approved")->default(false);
            // $table->Integer("advertismentsable_id");
            // $table->string("advertismentsable_type");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisments');
    }
}
