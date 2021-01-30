<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// デフォルト設定
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show')->where("post", "[0-9]+"); // 記事詳細。選ばれし記事を controller の show メソッドへ。正規表現で post/create のデータがこっちに流れるのを回避。
Route::get('/posts/create', 'PostController@create'); // 記事詳細。選ばれし記事を controller の show メソッドへ
Route::post("/posts", "PostController@store");
Route::get("/posts/{post}/edit", "PostController@edit");
Route::patch("/posts/{post}", "PostController@update");
Route::delete("/posts/{post}", "PostController@destroy");
Route::post("/posts/{post}/comments", "CommentController@store");
Route::delete("/posts/{post}/comments/{comment}", "CommentController@destroy"); // {} は id