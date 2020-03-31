<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a href="#maindata" role="tab" data-toggle="tab" class="nav-link active">Основние данние</a>
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
                    minlength="3"
                    required>
            </div>
            <div class="form-group">
              <label for="slug">Идентификатор</label>
              <input type="text" name="slug"
                    id="slug"
                    value="{{ old('slug', $item->slug) }}"
                    class="form-control" >
            </div>
            <div class="form-group">
              <label for="parent_id">Родитель</label>
              <select class="form-control"
                    name="parent_id"
                    id="parent_id"
                    placeholder="Категория">
                    <option value="0" @if(0 == old('parent_id', $item->parent_id)) selected @endif>
                      Нету
                    </option>
                @foreach($categoryList as $categoryOption)



                  <option value="{{ $categoryOption->id }}" @if($categoryOption->id ==  old('parent_id', $item->parent_id)) selected @endif>
                    {{ $categoryOption->id }}. {{ $categoryOption->title }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="description">Описание</label>
              <textarea type="text" name="description"
                    id="description"
                    rows="3"
                    class="form-control">{{ old('description', $item->description) }}</textarea>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
