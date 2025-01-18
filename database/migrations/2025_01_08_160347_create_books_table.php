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
			$table->string('isbn');
			$table->string('description');
			$table->string('cover_img');
			$table->string('publisher');
			$table->date('publication_date');
			$table->string('category');
			$table->integer('page_count');
			$table->boolean('available')->default('1');
            $table->timestamps();
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
