@extends("layouts.default") {{-- layouts フォルダの default --}}

@section("title", $post->title)

@section("content")
  <h1>
    <a href="{{ url("/") }}" class="header-menu">Back</a>
    {{ $post->title }}
  </h1>
  {{-- 記事は改行コードを改行タグに変換するので{{}}エスケープはせず、{!! nl2br(e($post->body)) !!} とする。!! はエスケープしないという意味、e で文章はエスケープさせ、nl2br で改行コードを改行タグに変換する --}}
  <p>{!! nl2br(e($post->body)) !!}</p>

  <h2>コメントやで</h2>
  <ul>
    @forelse ($post->comments as $comment)
    <li>
      {{ $comment->body }}
      <a href="#" class="del" data-id="{{ $comment->id }}">[x]</a>
      <form method="post" action="{{ action("CommentController@destroy", [$post, $comment]) }}" id="form_{{ $comment->id }}">
        {{ csrf_field() }}
        {{ method_field("delete") }}
      </form>
    </li>
    @empty
      <li>ノーコメントやで！！</li>
    @endforelse 
  </ul>
  {{-- ↓ コメントコントローラーのアクションに対して $post を紐付けた形で送信 --}}
  <form method="post" action="{{ action("CommentController@store", $post) }}">
    {{ csrf_field() }}
    <p>
    <input type="text" name="body" placeholder="コメントを入力するやで！！" value="{{ old("body") }}">
      @if ($errors->has("body"))
      <span class="error">{{ $errors->first("body") }}</span>
      @endif
    </p>
    <p>
      <input type="submit" value="コメントするで！！">
    </p>
  </form>
  <script src="/js/main.js"></script>
@endsection
