<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrivalConnectCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrival_connect_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('arrival_id');
            $table->unsignedBigInteger('arrival_category_id');
            $table->foreign('arrival_id')->references('id')->on('arrivals')->onDelete('cascade');
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
        Schema::dropIfExists('arrival_connect_categories');
    }
}
