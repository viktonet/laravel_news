@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Редактирование данних</div>
                <div class="card-body">
                  @include('news.admin.posts.includes.result_messages')
                    @if($item->exists)
                      <form action="{{ route('user.all.update', $item->id) }}" method="post">
                        @method('PATCH')
                    @else
                      <form action="{{ route('user.all.store') }}" method="post">
                    @endif


                      @csrf
                      <div class="row justify-content-center">
                        <div class="col-md-8">
                          @include('user.includes.item_edit_main_col')
                        </div>
                        <div class="col-md-3">
                          @include('user.includes.item_edit_add_col')
                        </div>
                      </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
