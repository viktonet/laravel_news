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
