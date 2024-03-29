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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show')->where("post", "[0-9]+");
Route::get('/posts/create', 'PostController@create');
Route::post("/posts", "PostController@store");
Route::get("/posts/{post}/edit", "PostController@edit");
Route::patch("/posts/{post}", "PostController@update");
Route::delete("/posts/{post}", "PostController@destroy");
Route::post("/posts/{post}/comments", "CommentController@store");
Route::delete("/posts/{post}/comments/{comment}", "CommentController@destroy");
