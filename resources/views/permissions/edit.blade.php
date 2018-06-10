@extends('layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('permissions.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Edit</strong> Permission 
                <small>
                  Editing permission {{ $permission->name }}, complete the form details below and press submit to save your data.
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              @if ($errors->any())
              <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              @endif

              {!! Form::model($permission, [
                'method' => 'PATCH',
                'url' => ['/permissions', $permission->id],
                'class' => 'form-horizontal',
                'files' => true
              ]) !!}

              @include ('permissions.form', ['submitButtonText' => 'Update'])

              {!! Form::close() !!}

            </div><!-- ./card-body-->

            <div class="card-footer">
              Edit permission form
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection

@push('head_scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.0/awesome-bootstrap-checkbox.min.css" rel="stylesheet" type="text/css"/>
@endpush

@push('scripts')
  <script type="text/javascript">
      $('#label').keyup(function() {
        $('#name').val($(this).val().toLowerCase().replace(/[^a-z]/g, '_'));
    })
  </script>
@endpush