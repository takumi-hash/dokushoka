<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\User;

use \App\Post;

class PostsController extends Controller
{
/*    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            $data += $this->count_posts($user);
            return view('users.show', $data);
        }else {
            return view('welcome');
        }
    }*/
    public function create(Request $request)
    {
        $user = \Auth::user();
        
        return view('posts.create', [
        'user' => $user,
      ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | max:191',
            'content' => 'required|max:20000',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->back();
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
