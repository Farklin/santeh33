<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_category_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->nullable()->constrained('categories')->onDelete('cascade');
            $table->foreignId("product_id")->nullable()->constrained('products')->onDelete('cascade');  
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
        Schema::dropIfExists('link_category_product');
    }
}
