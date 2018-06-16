      <!-- Alerts: Flash -->
@if ($message = Session::get('success'))
      <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
@if ($message = Session::get('danger'))
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Danger!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
@if ($message = Session::get('warning'))
      <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Warning!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
@if ($message = Session::get('info'))
      <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>Info!</strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
@if ($errors->any())
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> {{ $message }} Please check the form below for errors
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
@endif
      <!-- /Alerts: Flash -->
