<style media="screen">
/* CSS */
.media-body .author {
  display: inline-block;
  font-size: 1rem;
  color: #000;
  font-weight: 700;
}
.media-body .metadata {
  display: inline-block;
  margin-left: .5rem;
  color: #777;
  font-size: .8125rem;
}
.footer-comment {
  color: #777;
}
.vote.plus:hover {
  color: green;
}
.vote.minus:hover {
  color: red;
}
.vote {
  cursor: pointer;
}
.comment-reply a {
  color: #777;
}
.comment-reply a:hover, .comment-reply a:focus {
  color: #000;
  text-decoration: none;
}
.devide {
  padding: 0px 4px;
  font-size: 0.9em;
}
.media-text {
  margin-bottom: 0.25rem;
}
.title-comments {
  font-size: 1.2rem;
  font-weight: bold;
  line-height: 1.5rem;
  color: rgba(0, 0, 0, .87);
  margin-bottom: 1rem;
  padding-bottom: .25rem;
  border-bottom: 1px solid rgba(34, 36, 38, .15);
}

</style>
<script type="text/javascript">
function unswer(id) {

  document.getElementById('parent_id').value = id;
  document.getElementById('dd').innerHTML='<div class = "alert alert-success" role = "alert"><button type="button" class="close" data-dismiss="alert" aria-lable="close" onclick="unswer_off(id);"><span aria-hidden="true">x</span></button>Ваш ответ '+document.getElementById(id).innerHTML+'</div>';

  document.getElementById('button').innerHTML = "ответить";

};

function unswer_off(id) {

  document.getElementById('parent_id').value = 0;
  document.getElementById('dd').innerHTML = '';
  document.getElementById('button').innerHTML = "Добавить";
};
</script>
<p>

  <div class="comments">
  <h3 class="title-comments">Комментарии ({{ count($news_comments) }})</h3>

  <ul class="media-list">
    <!-- Комментарий (уровень 1) -->
    @foreach ($news_comments as $comm)
      @if($comm->parent_id==0)
    <li class="media">
      <div class="media-body">
        <div class="media-heading">
          <div class="author" id="{{ $comm->id }}">{{ $comm->user->name }}</div>
            <div class="metadata">
              <span class="date">{{ $comm->created_at ? \Carbon\Carbon::parse($comm->created_at)->format('d.m H:i') : '' }}</span>
            </div>
          </div>
          <div class="media-text text-justify">{{ $comm->text }}</div>
          <div class="footer-comment">
            <span class="comment-reply">
              <a href="#{{ $comm->id }}" onclick="unswer({{ $comm->id }});" class="reply">ответить</a>
            </span>
          </div>
          <div style="margin-left: 40px;">
            @foreach ($news_comments as $comm2)
              @if($comm2->parent_id==$comm->id)
            <!-- Вложенный медиа-компонент (уровень 2) -->
              <div class="media">
                <div class="media-body">
                  <div class="author">{{ $comm2->user->name }}</div>
                  <div class="media-heading">{{ $comm2->created_at ? \Carbon\Carbon::parse($comm2->created_at)->format('d.m H:i') : '' }}</div>
                  <div class="media-text text-justify">{{ $comm2->text }}</div>

                </div>
              </div><!-- Конец вложенного комментария (уровень 2) -->
            @endif
          @endforeach
        </div>
        </div>
    </li>
  @endif
      @endforeach
  </ul>
</div>

@guest
  Коментировать могут пользователи после авторизации
@else

  <form action="{{ route('news.comments.store') }}" method="post">
  @method('POST')
  @csrf
  <input type="hidden" name="is_published" value="1">
  <input type="hidden" id="parent_id" name="parent_id" value="0">
  <input type="hidden" name="news_id" value="{{ $item->id }}">
  <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
  <div class="form-group">
    <label for="text">Ваш коментарий</label>
    <textarea type="text" name="text"
          id="text"
          rows="4"
          class="form-control">{{ $item->text }}</textarea>
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
@endguest
</p>
