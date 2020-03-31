@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      @if($item->exists)
        <form action="{{ route('news.admin.category.update', $item->id) }}" method="post">
        @method('PATCH')
      @else
        <form action="{{ route('news.admin.category.store') }}" method="post">
      @endif
        @csrf
        <div class="container">
          @if($errors->any())
            <div class="row justify-content-center">
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lable="close" >
                  <span aria-hidden="true" class="alert-danger">x</span>
                </button>
                  {{ $errors->first() }}
              </div>


            </div>
          @endif
          @if(session('success'))
            <div class = "row justify-content-center">
              <div class = "col-md-10">
                  <div class = "alert alert-success" role = "alert">
                      <button type="button" class="close" data-dismiss="alert" aria-lable="close">
                        <span aria-hidden="true">x</span>
                      </button>
                      {{ session()->get('success') }}
                  </div>
              </div>
            </div>
          @endif
          <div class="row justify-content-center">
            <div class="col-md-8">
              @include('news.admin.category.includes.item_edit_main_col');
            </div>
            <div class="col-md-3">
              @include('news.admin.category.includes.item_edit_add_col');
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
@endsection
