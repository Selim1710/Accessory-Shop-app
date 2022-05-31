<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('name');
            $table->integer('price');
            $table->integer('stock_quantity');
            $table->string('image');
            $table->double('offer');
            $table->string('description');

            ////////////// specifications //////////////

            $table->string('function');
            $table->string('metarials');
            $table->string('certification');
            $table->string('color');
            $table->string('size');
            $table->string('warranty');

            ////////////// Relations //////////////

            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accessories');
    }
}
