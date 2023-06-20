<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function create() {
        return view('create_post');
    }

    public function store(Request $request) {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect('/posts');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('edit', ['post' => $post]);

    }

    public function update($id, Request $request) {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect('/posts');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }
}
