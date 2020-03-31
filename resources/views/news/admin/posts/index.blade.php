@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <nav>
        <a href="{{ route('news.admin.posts.create') }}" class="btn btn-primary">Написать</a>
      </nav>

      <div class="card">
        <div class="card-body">
          <table width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Автор</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $post)
              @php /** @var \App\NewsCategory $item*/@endphp
              <tr @if(!$post->is_published) style="background-color: #ccc" @endif>
                <td>{{ $post->id }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->category->title }}</td>
                <td>
                  <a href="{{ route('news.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                </td>
                <td>
                  {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.m H:i') : '' }}
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
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
