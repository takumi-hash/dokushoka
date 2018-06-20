<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

class RankingController extends Controller
{
    public function want()
    {
        $books = \DB::table('book_user')->join('books', 'book_user.book_id', '=', 'books.id')->select('books.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('books.id', 'books.isbn', 'books.title', 'books.author', 'books.publisher', 'books.url', 'books.image_url','books.created_at', 'books.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.want', [
            'books' => $books,
        ]);
    }
    public function have()
    {
        $books = \DB::table('book_user')->join('books', 'book_user.book_id', '=', 'books.id')->select('books.*', \DB::raw('COUNT(*) as count'))->where('type', 'have')->groupBy('books.id', 'books.isbn', 'books.title', 'books.author', 'books.publisher', 'books.url', 'books.image_url','books.created_at', 'books.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.have', [
            'books' => $books,
        ]);
    }
}