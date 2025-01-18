<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {      
		DB::table('books')->insert([
			['id' => 1, 'title' => 'You will be able to draw animals by the end of this book', 'author' => 'Jake Spicer & Lancelot Richarson', 
				'isbn' => '978-1-78157-867-4', 'description' => 'Let go of your fear and unlock drawing skills', 'cover_img' => 'Spanielface.jpg', 'publisher' => 'Alison Starling', 
				'publication_date' => '2024-11-30', 'category' => 'non-fiction', 'page_count' => 200],
			['id' => 2, 'title' => 'Building a story brand', 'author' => 'Donald Miller', 
				'isbn' => '978-1-4041-0721-2', 'description' => '10 ways to share your creativity and get discovered', 'cover_img' => 'megaphone.jpg', 'publisher' => 'Harper Collins Leadership', 
				'publication_date' => '2017-11-30', 'category' => 'non-fiction', 'page_count' => 300],
			['id' => 3, 'title' => 'Show your work', 'author' => 'Austin Kleon', 
				'isbn' => '978-0-7611-7897-2', 'description' => 'Clarify your message so customers will listen', 'cover_img' => 'text.jpg', 'publisher' => 'Thomas Allen & Son Limited', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 200]
		]);	
    }
}
