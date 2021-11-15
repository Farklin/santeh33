<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('link_product_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->nullable()->constrained('products')->onDelete('cascade');  
            $table->foreignId("image_id")->nullable()->constrained('images')->onDelete('cascade');
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
        Schema::dropIfExists('link_product_image');
    }
}
