<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\User;

use \App\Book;

use \App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }
        return view('timeline', $data);
    }
    public function create(Request $request)
    {
        $user = \Auth::user();
        $book = Book::find($request->book_id);
        return view('posts.create', [
        'user' => $user,
        'book' => $book,
      ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | max:191',
            'content' => 'required|max:20000',
            'book_id'=> 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'book_id' => $request->book_id,
        ]);
        return redirect(route('books.show', $request->book_id));
    }

    public function edit($id)
    {
        $user = \Auth::user();
        $post = Post::find($id);

        return view('posts.edit', [
            'user' => $user,
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'content' => 'required|max:20000',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->book_id = $request->book_id;
        $post->save();

        return redirect('timeline');
    }
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect()->back();
    }
}
