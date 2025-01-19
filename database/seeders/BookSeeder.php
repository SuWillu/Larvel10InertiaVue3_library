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
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 200],			
			['id' => 4, 'title' => 'Some Title 1', 'author' => 'Gerald King', 
				'isbn' => '918-0-7611-7897-2', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tempus neque vitae sollicitudin sollicitudin. ', 'cover_img' => 'somefwot.jpg', 'publisher' => 'Hardy Thomas', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 240],
			['id' => 5, 'title' => 'Some Title 2', 'author' => 'Connie Francis', 
				'isbn' => '972-0-7611-7897-2', 'description' => 'Aenean hendrerit velit sit amet mi lobortis, eu euismod mauris luctus. Nam facilisis convallis turpis a faucibus.', 'cover_img' => 'wfegjpg', 'publisher' => 'Allycat', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 270],
			['id' => 6, 'title' => 'Some Title 3', 'author' => 'Elvis Presley', 
				'isbn' => '978-4-7611-7897-2', 'description' => 'Donec ultricies ante vitae est ornare, in sollicitudin quam sollicitudin. Sed venenatis condimentum augue in tincidunt.', 'cover_img' => 'eagergt.jpg', 'publisher' => 'asgwaerherh', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 300],
			['id' => 7, 'title' => 'Some Title 4', 'author' => 'David Smith', 
				'isbn' => '978-0-7611-7897-2', 'description' => 'Integer erat nisl, pulvinar nec nisl condimentum, ultricies efficitur ipsum. ', 'cover_img' => 'twget.jpg', 'publisher' => 'tjtw4tjrtj', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 260],
			['id' => 8, 'title' => 'Some Title 5', 'author' => 'Jenny Fisher', 
				'isbn' => '978-0-7811-7897-2', 'description' => 'Morbi nec est id enim dignissim accumsan eu at metus. Nunc rhoncus magna quam, non consectetur justo tempus porttitor. Curabitur sed ex mi. ', 'cover_img' => 'twget.jpg', 'publisher' => 'apdfjwpeojptj', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 450],
			['id' => 9, 'title' => 'Some Title 6', 'author' => 'Claudine Francier', 
				'isbn' => '978-0-7611-7897-2', 'description' => 'Maecenas eu magna varius, euismod enim ut, imperdiet arcu.', 'cover_img' => 'weweg.jpg', 'publisher' => 'Herringbone', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 6700],
			['id' => 10, 'title' => 'Some Title 7', 'author' => 'Mimmy Klein', 
				'isbn' => '978-0-7641-7897-2', 'description' => 'Quisque eleifend ipsum ex, ac semper lorem laoreet at. ', 'cover_img' => 'text.jpg', 'publisher' => 'connywoigj', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 300],
			['id' => 11, 'title' => 'Some Title 8', 'author' => 'Maria Austin', 
				'isbn' => '978-0-2611-7897-2', 'description' => 'Pellentesque condimentum risus vel convallis pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae ', 'cover_img' => 'twegfext.jpg', 'publisher' => 'Son Limited', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 700],
			['id' => 12, 'title' => 'Some Title 9', 'author' => 'Sally Fishrup', 
				'isbn' => '978-0-6611-7897-2', 'description' => 'Curabitur porttitor lorem a magna pellentesque accumsan. ', 'cover_img' => 'text.jpg', 'publisher' => 'Thomas & Son Limited', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 800],
			['id' => 13, 'title' => 'Some Title 10', 'author' => 'Kenny Rodgers', 
				'isbn' => '978-0-0611-7897-2', 'description' => 'Sed sodales placerat sapien. Sed ac vehicula nisi.', 'cover_img' => 'text.jpg', 'publisher' => 'Thomas Limited', 
				'publication_date' => '2014-04-01', 'category' => 'non-fiction', 'page_count' => 400]
		]);	
    }
}
