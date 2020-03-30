<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="button">Сохранить</button>
          <br><br>
          <a href="{{ route('news.admin.category.index') }}">К категориям</a>
        </div>
      </div>
    </div>
  </div>
</div>
@if($item->exists)
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="list-unstyled">
            <li>ID: {{ $item->id }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="created_at">Создано</label>
          <input type="text" name="created_at"
                id="created_at"
                value="{{ old('parent_id', $item->created_at) }}"
                class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="created_at">Изменено</label>
          <input type="text" name="updated_at"
                id="updated_at"
                value="{{ old('parent_id', $item->updated_at) }}"
                class="form-control" disabled>
        </div>
        </div>
      </div>
    </div>
  </div>
@endif
