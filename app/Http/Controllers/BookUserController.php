<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class BookUserController extends Controller
{
    public function want()
    {
        $isbn = request()->isbn;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'isbn' => $isbn,
        ]);
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Book::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'author' => $rws_item['author'],
            'publisher' => $rws_item['publisherName'],
            'caption' => $rws_item['itemCaption'],
            'url' => $rws_item['itemUrl'],
            'image_url' => str_replace('?_ex=200x200', '', $rws_item['largeImageUrl']),
        ]);

        \Auth::user()->want($item->id);

        return redirect()->back();
    }

    public function dont_want()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_wanting($isbn)) {
            $itemId = Book::where('isbn', $isbn)->first()->id;
            \Auth::user()->dont_want($itemId);
        }
        return redirect()->back();
    }
    
    public function have()
    {
        $isbn = request()->isbn;

        // Search items from "itemCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('BooksBookSearch', [
            'isbn' => $isbn,
        ]);
        $rws_item = $rws_response->getData()['Items'][0]['Item'];

        // create Item, or get Item if an item is found
        $item = Book::firstOrCreate([
            'isbn' => $rws_item['isbn'],
            'title' => $rws_item['title'],
            'author' => $rws_item['author'],
            'publisher' => $rws_item['publisherName'],
            'caption' => $rws_item['itemCaption'],
            'url' => $rws_item['itemUrl'],
            'image_url' => str_replace('?_ex=200x200', '', $rws_item['largeImageUrl']),
        ]);

        \Auth::user()->have($item->id);

        return redirect()->back();
    }

    public function dont_have()
    {
        $isbn = request()->isbn;

        if (\Auth::user()->is_having($isbn)) {
            $itemId = Book::where('isbn', $isbn)->first()->id;
            \Auth::user()->dont_have($itemId);
        }
        return redirect()->back();
    }
}