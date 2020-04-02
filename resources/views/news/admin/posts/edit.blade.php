@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="container">
        @include('news.admin.posts.includes.result_messages')
          @if($item->exists)
            <form action="{{ route('news.admin.posts.update', $item->id) }}" method="post">
            @method('PATCH')
          @else
            <form action="{{ route('news.admin.posts.store') }}" method="post">
          @endif
            @csrf
            <div class="row justify-content-center">
              <div class="col-md-8">
                @include('news.admin.posts.includes.item_edit_main_col')
              </div>
              <div class="col-md-3">
                @include('news.admin.posts.includes.item_edit_add_col')
              </div>
            </div>
      </form>
      @if($item->exists)
        <br>
        <form method="post" action="{{ route('news.admin.posts.destroy', $item->id) }}" >
          @method('DELETE')
          @csrf
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card card-block">
                <div class="card-body ml-auto">
                  <button type="submit" class="btn btn-link">Удалить</button>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            </div>
          </div>
        </form>
      @endif
      </div>
    </div>
  </div>

</div>
@endsection
