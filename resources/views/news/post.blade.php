@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="blog-post">
          <h2 class="blog-post-title">
            {{  $item->title }}
          </h2>
          <p class="blog-post-meta">
            Автор: {{ $item->user->name }}
          </p>
          <p class="category">
            Категория: <small>{{ $item->category->title }}</small>
          </p>
          <p class="text">
            {{ $item->content_html }}
          </p>
          <p class="blog-post-meta">
            {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.m H:i') : '' }} <a href="#">Up</a>
          </p>
        </div>

        @if(count($news_comments)==0)
        Нету комментариев
        @endif
        @include('news.show_comments')
      </div>
      <div class="col-md-3">
        @include('news.view_cat')
      </div>
    </div>

  </div>
@endsection
