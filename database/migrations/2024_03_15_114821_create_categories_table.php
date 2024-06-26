<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('category_title')->nullable();
            $table->string('category_subtitle')->nullable();
            $table->string('category_img');
            $table->string('cat_headerImg_PC')->nullable();
            $table->string('cat_headerImg_mobile')->nullable();
            $table->boolean('reverseAlign')->default(false);
            $table->string('slug');
            $table->integer('subcategory_count')->default(0);
            $table->integer('product_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
