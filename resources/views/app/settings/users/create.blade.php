@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.users.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Create</strong> User 
                <small>
                  To add a new user record, complete the form details below and press submit to save your data.
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              {{ Form::open([
                'url' => ['settings/users'],
                'class' => 'form-horizontal needs-validation',
                'novalidate' => ''
              ]) }}

              <div class="form-group row">
                {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('name', null, ['class' => 'form-control', 'required' => '']) !!}
                  <div class="invalid-feedback">You must enter a name.</div>
                    @if ($errors->any())
                      <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
              </div>

              <div class="form-group row">
                {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::email('email', null, ['class' => 'form-control', 'required' => '']) !!}
                  <div class="invalid-feedback">You must enter a valid email.</div>
                  @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                {!! Form::label('password', 'Password*', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                  <div class="invalid-feedback">You must enter a password.</div>
                  @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                  @endif
                </div>
              </div>

              {{--  <div class="form-group row">
                {!! Form::label('password', 'Confirm Password*', ['class' => 'col-md-3 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                  <div class="invalid-feedback">You must enter a matchin password.</div>
                </div>
              </div>  --}}

              <hr />

              <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                {!! Form::label('role', 'Roles', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  @foreach ($roles as $role) 
                  <div class="checkbox">
                    <label>
                      {{ Form::checkbox('roles[]', $role->id) }}
                      {{ ucfirst($role->name) }}
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>

              <hr />

              <div class="row">
                <div class="offset-md-2 col-md-4">
                  {{ Form::button('<i class="fa fa-dot-circle-o"></i> Create User', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                  <a href="{{ route('app.settings.users.index') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
                </div>
              </div>

              {{ Form::close() }}

            </div><!-- ./card-body-->

            <div class="card-footer">
              Add User form
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>