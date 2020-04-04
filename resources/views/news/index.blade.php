@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <table width="100%">
              <thead>
                <tr>
                  <th>Автор</th>
                  <th>Заголовок</th>
                  <th>Дата публикации</th>

                </tr>
              </thead>
              <tbody>
              @foreach ($paginator as $post)
                <tr @if(!$post->is_published) style="background-color: #ccc" @endif>

                  <td>@if($post->user->name) {{ $post->user->name  }} @endif</td>
                  <td>
                    <a href="{{ route('news.show', $post->id) }}">{{ $post->title }}</a>
                  </td>
                  <td>
                    {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.m H:i') : '' }}
                    [{{ $post->commentsCount->count() }}]
                  </td>

                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        @include('news.view_cat')
      </div>
    </div>
    @if($paginator->total() > $paginator->count())
      <br>
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              {{ $paginator->links() }}
            </div>
          </div>
        </div>
      </div>
    @endif
  </div>
@endsection
