@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <nav>
        <a href="{{ route('news.admin.category.create') }}" class="btn btn-primary">Добавить</a>
      </nav>

      <div class="card">
        <div class="card-body">
          <table width="100%">
            <thead>
              <tr>
                <td>#</td>
                <td>Категория</td>
                <td>Родитель</td>
              </tr>
            </thead>
            <tbody>
            @foreach ($paginator as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>
                  <a href="{{ route('news.admin.category.edit', $item->id) }}">{{ $item->title }}</a>
                </td>
                <td @if(in_array($item->parent_id, [1])) style="colod:#ccc;" @endif>
                  {{ optional($item->parentCategory)->title }}
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
