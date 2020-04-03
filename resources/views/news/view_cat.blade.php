@foreach ($category_data as $cat)
  <div @if($cat->id == $id) class="card-header" @endif >
      <a href="{{ route('category.show', $cat->id) }}">
        {{ $cat->title }}</a>
  </div>
@endforeach
<p @if($id=='') class="card-header" @endif>
  <a href="{{ route('news.index') }}">
    Все статьи</a>
</p>
@if(isset($item->id))
<form action="{{ route('rss.store') }}" method="post">
@method('POST')
@csrf
<input type="hidden" name="is_published" value="1">
<input type="hidden" id="parent_id" name="parent_id" value="0">
<input type="hidden" name="news_id" value="{{ $item->id }}">
<input type="hidden" name="user_id" value="{{ $item->user_id }}">

<h3>Получать новости</h3>
<div class="form-group">
  <label for="text">Ваше Имя</label>
  <input type="text" name="name"
        id="name"
        value="{{ old('name', '') }}"
        class="form-control"
        minlength="3"
        required>
</div>
<div class="form-group">
  <label for="text">Ваш E-mail</label>
  <input type="text" name="email"
        id="email"
        value="{{ old('email', '') }}"
        class="form-control"
        minlength="3"
        required>
</div>
<div class="form-group">
  <div class = "row justify-content-left ">

    <div class = "col-md-2">
      <button type="submit" class="btn btn-primary" id="button">Добавить</button>
    </div>
    <div class = "col-md-6">
      <span id="dd"></span>
    </div>
  </div>

</div>
</form>
@endif
