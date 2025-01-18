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
        Schema::create('book_checkouts', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained(
				table: 'books', indexName: 'book_id2'
			);
			$table->foreignId('user_id')->constrained(
				table: 'users', indexName: 'user_id2'
			);
			$table->date('checkout_date');
			$table->date('date_returned')->nullable();
			$table->foreignId('librarian_id')->nullable()->constrained(
				table: 'users', indexName: 'librarian_id'
			);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_checkouts');
    }
};
