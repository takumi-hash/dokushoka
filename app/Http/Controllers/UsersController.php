<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Book;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $count_want = $user->want_books()->count();
        $books = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);

        return view('users.show', [
            'user' => $user,
            'books' => $books,
            'count_want' => $count_want,
            // 'count_have' => $count_have,
        ]);
    }
}
