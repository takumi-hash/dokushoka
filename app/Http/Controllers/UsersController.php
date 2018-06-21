<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Book;

use App\Post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $count_want = $user->want_books()->count();
        $count_have = $user->want_books()->count();
        $books = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        $count_posts = $user->posts()->count();

        return view('users.show', [
            'user' => $user,
            'books' => $books,
            'posts' => $posts,
            'count_want' => $count_want,
            'count_have' => $count_have,
            'count_posts' => $count_posts,
        ]);
    }

}
