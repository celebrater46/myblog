<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request, Post $post) {
        $this->validate($request, [
            "body" => "required"
        ]);
        $comment = new Comment(["body" => $request->body]);
        $post->comments()->save($comment);
        return redirect()->action("PostController@show", $post); // 別の場所にリダイレクトする際の書き方
    }

    public function destroy(Post $post, Comment $comment) {
        $comment->delete();
        return redirect()->back(); // 元の画面に戻る
    }
}
