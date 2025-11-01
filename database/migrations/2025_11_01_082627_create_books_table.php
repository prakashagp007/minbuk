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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('bookname');
        $table->string('author')->nullable();
        $table->string('reference')->nullable();
        $table->integer('pages_count')->nullable();
        $table->string('book_id')->unique();
        $table->string('image')->nullable();
        $table->string('pdf_link')->nullable();
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('language_id');
        $table->timestamps();

        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
