<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // 名前空間の短縮
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    // URL + / GET 時に実行される
    public function index() {
        // return 'hello';
        // $posts = \App\Post::all();
        // $posts = Post::all();
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest()->get(); // 上と同じ命令
        // $posts = [];
        // dd($posts->toArray()); // データが取得できたかどうかのテスト。dump die
        // return view('posts.index', ['posts' => $posts]); // フォルダの区切りがドットなので注意。第2引数で view に渡す。
        return view('posts.index')->with('posts', $posts); // 上に同じ。with の第一引数は view で $posts を使うための名前付け。
    }

    // public function show($id) {
    public function show(Post $post) { // URL から $id を受け取りコントローラーで $id を元にモデルを引っ張るために、暗黙的にモデルをデータに結びつける Implicit Binding
        // $post = Post::find($id);
        // $post = Post::findOrFail($id); // id のデータが見つからなかった場合の処理も行うには findOrFail（Implicit Binding の場合は id が勝手に引っ張られてくるので不要）
        return view('posts.show')->with('post', $post); // -> resources/views/posts/show.blade.php

    }

    public function create() {
        return view("posts.create");
    }

    public function store(PostRequest $request) { // 新規投稿から来たデータの処理
        // $this->validate($request, [
        //     "title" => "required | min:3", // タイトルには最低3文字必要
        //     "body" => "required"
        // ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect("/");
    }

    public function edit(Post $post) {
        return view('posts.edit')->with('post', $post);
    }

    public function update(PostRequest $request, Post $post) { // 新規投稿から来たデータの処理
        // $this->validate($request, [
        //     "title" => "required | min:3", // タイトルには最低3文字必要
        //     "body" => "required"
        // ]);
        // $post = new Post(); // 新しく Post を作る必要はない
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
