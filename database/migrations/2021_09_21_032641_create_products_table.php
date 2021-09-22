<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('sublevel_id');
            $table->string('name_en');
            $table->string('name_id');
            $table->string('slug_en');
            $table->string('slug_id');
            $table->string('code');
            $table->string('quantity');
            $table->string('tags_en');
            $table->string('tags_id');
            $table->string('size_en')->nullable();
            $table->string('size_id')->nullable();
            $table->string('color_en');
            $table->string('color_id');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('short_description_en');
            $table->string('short_description_id');
            $table->text('long_description_en');
            $table->text('long_description_id');
            $table->string('thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}
