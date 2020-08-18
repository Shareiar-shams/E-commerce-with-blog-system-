<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideingimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slideingimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->boolean('status')->nullable();
            $table->integer('price')->nullable();
            $table->integer('newprice')->nullable();
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
        Schema::dropIfExists('slideingimages');
    }
}
