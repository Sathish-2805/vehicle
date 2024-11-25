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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Title of the post
            $table->unsignedBigInteger('category_id'); // Foreign key to categories
            $table->text('description'); // Description of the post
            $table->string('image'); // Path to the image
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Define foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
