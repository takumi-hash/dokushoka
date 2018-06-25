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

    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'followings' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'followers' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }

    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(100);

        $data = [
            'user' => $user,
            'posts' => $favorites,
        ];

        $data += $this->count_favorites($user);

        return view('users.favorites', $data);
    }

    public function show($id)
    {
        $user = User::find($id);
        $count_want = $user->want_books()->count();
        $count_have = $user->want_books()->count();
        $books = \DB::table('books')->join('book_user', 'books.id', '=', 'book_user.book_id')->select('books.*')->where('book_user.user_id', $user->id)->distinct()->paginate(20);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(3);
        $followings = $user->followings()->paginate(10);
        $followers = $user->followers()->paginate(10);
        $favorites = $user->favorites()->paginate(30);
        $count_posts = $user->posts()->count();
        $count_followers = $user->followers()->count();
        $count_followings = $user->followings()->count();
        $count_favorites = $user->favorites()->count();

        return view('users.show', [
            'user' => $user,
            'books' => $books,
            'posts' => $posts,
            'followings' => $followings,
            'followers' => $followers,
            'favorites' => $favorites,
            'count_want' => $count_want,
            'count_have' => $count_have,
            'count_posts' => $count_posts,
            'count_followers' => $count_followers,
            'count_followings' => $count_followings,
            'count_favorites' => $count_favorites,
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'bio' => 'max:191',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();

        return redirect(route('users.show', \Auth::user()->id));
    }
}
