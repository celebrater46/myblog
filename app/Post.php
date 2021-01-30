<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // title と body にデータ挿入を許可。
    protected $fillable = ['title', 'body'];

    public function comments() { // comments としたのは、ひとつの Post に対してコメントは複数つき得るから
        return $this->hasMany("App\Comment"); // post はたくさんの comment を持っている
    }
}
