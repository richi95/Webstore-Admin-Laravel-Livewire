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
            $table->integer('category_id')->nullable();
            
            $table->string('name');

            $table->integer('main_page_highlight')->default(0);
            $table->integer('category_highlight')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('user_reviews')->default(0);
            $table->integer('adjustable_quantity')->default(0);
            $table->integer('nocount')->default(0);

            $table->string('slug');
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();

            $table->integer('price')->default(0);
            $table->integer('hotprice')->default(0);

            $table->string('description', 2000)->nullable();
            
            $table->document->string('description', 2000)->nullable();
            $table->image->string('description', 2000)->nullable();
            $table->main_image->string('description', 2000)->nullable();

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
