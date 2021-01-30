@extends("layouts.default") {{-- layouts フォルダの default --}}

@section("title", "Edit Post")

@section("content")
  <h1>
    <a href="{{ url("/") }}" class="header-menu">Back</a>
    Edit Post
  </h1>
<form method="post" action="{{ url("/posts", $post->id) }}">
  {{ csrf_field() }}
  {{-- ↓ ルーティングのパッチメソッド --}}
  {{ method_field("patch") }}
  <p>
    {{-- タイトルがなかったら post の title を表示してね --}}
    <input type="text" name="title" placeholder="タイトルを入力するやで！！" value="{{ old("title", $post->title) }}">
    @if ($errors->has("title"))
    <span class="error">{{ $errors->first("title") }}</span>
    @endif
  </p>
  <p>
  <textarea name="body" placeholder="本文を入力するやで！！">{{ old("body", $post->body) }}</textarea>
    @if ($errors->has("body"))
    <span class="error">{{ $errors->first("body") }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="Update">
  </p>
</form>
@endsection
