<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_slug');
            $table->string('country');
            $table->string('address');
            $table->string('postcode');
            $table->string('city');
            $table->string('phoneNo');
            $table->string('email');
            $table->string('slug');
            $table->string('pname');
            $table->string('pquantity');
            $table->string('image');
            $table->double('total');
            $table->string('de_method');
            $table->boolean('status');
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
        Schema::dropIfExists('orderproducts');
    }
}
