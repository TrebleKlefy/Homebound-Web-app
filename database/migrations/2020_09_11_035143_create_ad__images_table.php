<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad__images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('images')->nullable();
            $table->integer('advertisment_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('advert_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad__images');
    }
}
