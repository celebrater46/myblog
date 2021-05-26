<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // 名前空間の短縮
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get(); // 上と同じ命令
        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post) {
        return view('posts.show')->with('post', $post); // -> resources/views/posts/show.blade.php

    }

    public function create() {
        return view("posts.create");
    }

    public function store(PostRequest $request) {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect("/");
    }

    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post) {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect("/");
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect("/");
    }
}
