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
            $table->string('title');
            $table->string('author');
            $table->string('img');
            $table->integer('price');
            $table->text('descr');
            $table->bigInteger('bookCoverID')->unsigned();
            $table->foreign('bookCoverID')->references('id')->on('bookCovers');
            $table->string('pagesCount');
            $table->string('weight');
            $table->string('publisher');
            $table->string('series');
            $table->string('ageLimit');
            $table->string('ISBN');
            $table->bigInteger('bookGenreID')->unsigned();
            $table->foreign('bookGenreID')->references('id')->on('bookGenres');
            $table->integer('qty');
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
