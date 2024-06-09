<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->bigInteger('quantity');
            $table->string('tags')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
            $table->double('selling_price');
            $table->double('discount_price')->nullable();
            $table->text('short_desc');
            $table->text('long_desc')->nullable();
            $table->string('image');
            $table->tinyInteger('hot_deals')->nullable();
            $table->tinyInteger('featured')->nullable();
            $table->tinyInteger('special_offer')->nullable();
            $table->tinyInteger('special_deals')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
