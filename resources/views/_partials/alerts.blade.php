      <!-- Alerts -->
@if (Session::has('flash_message'))
    <div class="container-fluid">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('flash_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
@endif
@if (Session::has('flash_danger'))
    <div class="container-fluid">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('flash_danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
@endif
      <!-- /Alerts -->
