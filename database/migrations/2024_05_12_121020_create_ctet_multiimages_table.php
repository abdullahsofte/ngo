<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtetMultiimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctet_multiimages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subreport_id');
            $table->string('multiimage');
            $table->timestamps();


            $table->foreign('subreport_id')->references('id')->on('sub_reports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctet_multiimages');
    }
}
