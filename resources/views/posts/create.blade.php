@extends("layouts.default") {{-- layouts フォルダの default --}}

@section("title", "New Post")

@section("content")
  <h1>
    <a href="{{ url("/") }}" class="header-menu">Back</a>
    New Post
  </h1>
<form method="post" action="{{ url("/posts") }}">
  {{ csrf_field() }}
  <p>
  <input type="text" name="title" placeholder="タイトルを入力するやで！！" value="{{ old("title") }}">
    @if ($errors->has("title"))
    <span class="error">{{ $errors->first("title") }}</span>
    @endif
  </p>
  <p>
  <textarea name="body" placeholder="本文を入力するやで！！">{{ old("body") }}</textarea>
    @if ($errors->has("body"))
    <span class="error">{{ $errors->first("body") }}</span>
    @endif
  </p>
  <p>
    <input type="submit" value="投稿するやで！！">
  </p>
</form>
@endsection
