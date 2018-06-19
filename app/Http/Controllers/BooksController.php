<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\Book;

  class BooksController extends Controller
  {

    public function create()
    {
        $keyword = request()->keyword;
        $books = [];
        if ($keyword) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('IchibaBookSearch', [
                'keyword' => $keyword,
                'imageFlag' => 1,
                'hits' => 20,
            ]);

            // Creating "Book" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Books'] as $rws_item) {
                $item = new Book();
                $item->code = $rws_item['Item']['isbn'];
                $item->name = $rws_item['Item']['title'];
                $item->author = $rws_item['Item']['author'];
                $item->publisher = $rws_item['Item']['publisherName'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=120x120', '', $rws_item['Item']['mediumImageUrls'][0]['imageUrl']);
                $books[] = $item;
            }
        }

        return view('books.create', [
            'keyword' => $keyword,
            'books' => $books,
        ]);
    }
  }