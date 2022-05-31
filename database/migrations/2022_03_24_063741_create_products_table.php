<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->double('offer');
            $table->string('description');

            ////////////// specifications //////////////

            // car feature
            $table->string('bluetooth')->default('no');
            $table->string('DVD_player')->default('no');
            $table->string('leather_interior')->default('no');
            $table->string('push_star_ignition')->default('no');
            $table->string('perking_assist')->default('no');

            // car details
            $table->string('wheel');
            $table->string('top_speed');
            $table->string('seat_capacity');
            $table->string('body');
            $table->string('engine_capacity');
            $table->string('drive');
            $table->string('mileage');
            $table->string('fuel_type');
            $table->string('condition');
            $table->string('exterior_color');
            $table->string('interior_color');
            $table->string('warranty');

            ////////////// Relations //////////////

            $table->unsignedBigInteger('brand_id')->default();
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
