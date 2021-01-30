@extends("layouts.default") {{-- layouts フォルダの default --}}

{{-- @section("title")
Blog Posts やで！    
@endsection --}}

@section("title", "Blog Posts")

@section("content")
  <h1>
    <a href="{{ url("/posts/create") }}" class="header-menu">New Post</a>
    Blog Posts やで！
  </h1>
  <ul>
    {{-- 波括弧でエスケープ！ --}}
    {{-- @foreach ($posts as $post)
    <li><a href="">{{ $post->title }}</a></li>
    @endforeach --}}

    {{-- $posts が空だったらの場合の処理もする場合は forelse --}}
    @forelse ($posts as $post)
    {{-- <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li> --}}
    {{-- ↓ URL自動生成命令（上と全く同じ意味） --}}
    {{-- <li><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></li> --}}
    {{-- ↓ コントローラーの show に対応する URL を生成 --}}
    <li>
      <a href="{{ action('PostController@show', $post) }}">{{ $post->title }}</a>
      <a href="{{ action('PostController@edit', $post) }}" class="edit">編集するで！</a>
      <a href="#" class="del" data-id="{{ $post->id }}">[x]</a>
      <form method="post" action="{{ url("/posts", $post->id) }}" id="form_{{ $post->id }}">
        {{ csrf_field() }}
        {{ method_field("delete") }}
      </form>
    </li>
    @empty
      <li>まだ未投稿やで！！</li>
    @endforelse 
  </ul>
  <script src="/js/main.js"></script>
@endsection