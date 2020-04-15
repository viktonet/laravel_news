<div class="row justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="card-title"></div>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a href="#maindata" role="tab" data-toggle="tab" class="nav-link active">User data</a>
          </li>
        </ul>
        <br>
        <div class="tab-content">
          <div class="tab-pane active" id="maindata" role="tabpanel">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name"
                    id="name"
                    value="{{ old('name', $item->name) }}"
                    class="form-control"
                    minlength="3"
                    required>
            </div>
            <div class="form-group">
              <label for="name">Surname</label>
              <input type="text" name="surname"
                    id="surname"
                    value="{{ old('surname', $item->surname) }}"
                    class="form-control"
                    minlength="3"
                    required>
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="text" name="email"
                    id="email"
                    value="{{ old('email', $item->email) }}"
                    class="form-control" >
            </div>
            @if(!$item->exists)
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password"
               id="password"
               name="password" required autocomplete="new-password"
              class="form-control" >
            </div>
            <div class="form-group">
              <label for="password-confirm">Password confirm</label>
              <input type="password" name="password_confirmation"
                    id="password-confirm"

                    class="form-control" >
            </div>
          @endif
            <div class="form-group">
              <label for="name">Phone number</label>
              <input type="text" name="phone"  placeholder="0934005190"
                    id="phone"
                    value="{{ old('phone', $item->phone) }}"
                    class="form-control"
                    minlength="10"
                    maxlength="10"
                    required>
            </div>
            <div class="form-group">
              <label for="name">Date of birthday</label>
              <input type="text" placeholder="dd.mm.yyyy" name="date_of_birthday"
                    id="date_of_birthday"
                    @if($item->exists)
                      value="{{ old('date_of_birthday', date('d.m.Y', strtotime($item->date_of_birthday))) }}"
                    @else
                      value="{{ old('date_of_birthday') }}"
                    @endif
                    class="form-control"
                    minlength="10"
                    maxlength="10"
                    required>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
