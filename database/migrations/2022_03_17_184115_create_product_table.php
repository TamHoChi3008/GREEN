<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name');
            $table->integer('product_category_id');
            $table->integer('product_brand_id');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->text('product_content');
            $table->text('product_descript');
            $table->integer('product_discount');
            $table->integer('product_size');
            $table->string('product_image1_link');
            $table->string('product_image2_link');
            $table->string('product_image3_link');
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
        Schema::dropIfExists('product');
    }
}
