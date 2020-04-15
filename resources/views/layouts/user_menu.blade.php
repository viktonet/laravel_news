<ul>
  <li  class="btn btn-link"><a href="{{ route('news.admin.posts.index') }}" class="btn btn-primary">Статьи</a></li>
  <li  class="btn btn-link"><a href="{{ route('news.admin.category.index') }}" class="btn btn-primary">Категории</a></li>
  <li  class="btn btn-link"><a href="{{ route('user.index') }}" class="btn btn-primary">Ваши дание</a></li>
  <li  class="btn btn-link"><a href="{{ route('user.all.index') }}" class="btn btn-primary">Все пользователи</a></li>
</ul>
<ul>
  <li  class="btn"><a href="{{ route('news.index') }}" class="btn btn-primary">Все статьи</a></li>
  <li  class="btn"><a href="{{ route('news.index') }}?popular=true" class="btn btn-primary">Популярние статьи</a></li>

</ul>
