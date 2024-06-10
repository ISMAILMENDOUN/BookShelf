<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use GuzzleHttp\Client;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        // Replace 'YOUR_API_KEY' with your actual API key
        $apiKey = 'AIzaSyD6_NJM6NXZevF8PzMh57KYcJnrevSDPUE';
        $client = new \GuzzleHttp\Client([
            'verify' => config_path('cacert.pem'),
        ]);        
        $response = $client->get('https://www.googleapis.com/books/v1/volumes?q=programming&key=' . $apiKey);
        $booksData = json_decode($response->getBody(), true);

        foreach ($booksData['items'] as $item) {
            $volumeInfo = $item['volumeInfo'];

            $title = $volumeInfo['title'];
            $author = isset($volumeInfo['authors']) ? implode(', ', $volumeInfo['authors']) : 'Unknown';
            $isbn = isset($volumeInfo['industryIdentifiers'][0]['identifier']) ? $volumeInfo['industryIdentifiers'][0]['identifier'] : null;
            $publication_date = isset($volumeInfo['publishedDate']) ? $volumeInfo['publishedDate'] : null;
           if ($publication_date !== null) {
           $publication_date = $publication_date . '-01-01';}

            $genre = isset($volumeInfo['categories']) ? implode(', ', $volumeInfo['categories']) : 'Unknown';
            $publisher = isset($volumeInfo['publisher']) ? $volumeInfo['publisher'] : 'Unknown';
            $language = isset($volumeInfo['language']) ? $volumeInfo['language'] : 'Unknown';
            $pages = isset($volumeInfo['pageCount']) ? $volumeInfo['pageCount'] : null;
            $format = 'Unknown'; // Google Books API does not provide format information
            $price = 0; // You may need to fetch this data from another source
            $description = isset($volumeInfo['description']) ? $volumeInfo['description'] : 'No description available';
            $cover_image = isset($volumeInfo['imageLinks']['thumbnail']) ? $volumeInfo['imageLinks']['thumbnail'] : null;

            Book::create([
                'title' => $title,
                'author' => $author,
                'isbn' => $isbn,
                'publication_date' => $publication_date,
                'genre' => $genre,
                'publisher' => $publisher,
                'language' => $language,
                'pages' => $pages,
                'format' => $format,
                'price' => $price,
                'description' => $description,
                'cover_image' => $cover_image,
            ]);
        }
    }
}
