<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Book;

use App\Post;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->paginate(20);
        $posts = Post::orderBy('updated_at', 'desc')->paginate(20);
        return view('welcome', [
            'books' => $books,
            'posts' => $posts,
        ]);
    }
}