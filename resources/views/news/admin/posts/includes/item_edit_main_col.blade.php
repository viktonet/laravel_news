<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        @if($item->is_published)
          Опубликовано
        @else
          Черновик
        @endif
      </div>
      <div class="card-body">
        <div class="card-title"></div>
        <div class="card-subtitle md-2 text-muted"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a href="#maindata" role="tab" data-toggle="tab" class="nav-link active">Основние данние</a>
          </li>
          <li class="nav-item">
            <a href="#adddata" role="tab" data-toggle="tab" class="nav-link ">Доп. данние</a>
          </li>
        </ul>
        <br>
        <div class="tab-content">
          <div class="tab-pane active" id="maindata" role="tabpanel">
            <div class="form-group">
              <label for="title">Заголовок</label>
              <input type="text" name="title"
                    id="title"
                    value="{{ old('title', $item->title) }}"
                    class="form-control"
                    minlength="5"
                    required>
            </div>
            <div class="form-group">
              <label for="content_raw">Статья</label>
              <textarea type="text" name="content_raw"
                    id="content_raw"
                    rows="10"
                    class="form-control">{{ old('content_raw', $item->content_raw) }}</textarea>
            </div>
          </div>
          <div  class="tab-pane" id="adddata" role="tabpanel">
            <div class="form-group">
              <label for="slug">Идентификатор</label>
              <input type="text" name="slug"
                    id="slug"
                    value="{{ old('slug', $item->slug) }}"
                    class="form-control" >
            </div>
            <div class="form-group">
              <label for="category_id">Категория</label>
              <select class="form-control"
                    name="category_id"
                    id="category_id"
                    placeholder="Категория">
                @foreach($categoryList as $categoryOption)

                  <option value="{{ $categoryOption->id }}" @if($categoryOption->id ==  old('category_id', $item->category_id)) selected @endif>
                     {{ $categoryOption->title }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-check">
              <input type="hidden" name="is_published" value="0">
              <input type="checkbox" name="is_published"
                    id="title"
                    class="form-check-input"
                    value="1"
                    @if($item->is_published) checked="checked" @endif>
              <label for="title">Опубликовано</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
