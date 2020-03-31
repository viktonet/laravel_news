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
