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
              <label for="name">ФИО</label>
              <input type="text" name="name"
                    id="name"
                    value="{{ old('name', $item->name) }}"
                    class="form-control"
                    minlength="3"
                    required>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" name="email"
                    id="email"
                    value="{{ old('emailemail', $item->email) }}"
                    class="form-control" >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
