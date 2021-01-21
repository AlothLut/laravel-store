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
            $table->string('name');
            $table->string('code')->unique();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->string('brand')->nullable();
            $table->string('country_producing_ru')->nullable();
            $table->string('country_producing_en')->nullable();
            $table->string('display_resolution')->nullable();
            $table->string('display_type')->nullable();
            $table->string('display_size')->nullable();
            $table->integer('weight')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->integer('ram_size')->nullable();
            $table->double('price')->default(0);
            $table->integer('category_id')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Schema::create('products_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('image_src');
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
        Schema::dropIfExists('products_images');
    }
}
