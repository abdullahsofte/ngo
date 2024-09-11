<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIctMultiImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ict_multi_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ict_id');
            $table->string('multiimage');
            $table->timestamps();

            $table->foreign('ict_id')->references('id')->on('icts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ict_multi_images');
    }
}
