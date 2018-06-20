<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\Book;

  class BooksController extends Controller
  {

    public function create()
    {
        $q_title = request()->q_title;
        $q_author = request()->q_author;
        $books = [];
        if (isset($q_title) || isset($q_author)) {
            $client = new \RakutenRws_Client();
            $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            $rws_response = $client->execute('BooksBookSearch', [
                'title' => $q_title,
                'author' => $q_author,
                'imageFlag' => 1,
                'hits' => 20,
            ]);

            // Creating "Book" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['Items'] as $rws_item) {
                $item = new Book();
                $item->isbn = $rws_item['Item']['isbn'];
                $item->title = $rws_item['Item']['title'];
                $item->author = $rws_item['Item']['author'];
                $item->publisher = $rws_item['Item']['publisherName'];
                $item->url = $rws_item['Item']['itemUrl'];
                $item->image_url = str_replace('?_ex=200x200', '', $rws_item['Item']['largeImageUrl']);
                $books[] = $item;
            }
        }

        return view('books.create', [
            'q_title' => $q_title,
            'q_author' => $q_author,
            'books' => $books,
        ]);
    }
    public function show($id)
    {
      $book = Book::find($id);
      $want_users = $book->want_users;
      $have_users = $book->have_users;

      return view('books.show', [
        'book' => $book,
        'want_users' => $want_users,
        'have_users' => $have_users,
      ]);
    }
}