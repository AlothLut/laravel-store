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
            $table->string('slug')->unique();
            $table->string('name_ru')->nullable();
            $table->string('name_en')->nullable();
            $table->string('status')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('brand')->nullable();
            $table->double('quantity')->default(0);
            $table->double('price')->default(0);
            $table->integer('category_id')->nullable();
            $table->boolean('active')->default(false);
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
