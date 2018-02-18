@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.users.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Create</strong> Role 
                <small>
                  To add a new role record, complete the form details below and press submit to save your data.
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

              {!! Form::open([
                'url' => '/app/settings/roles', 
                'class' => 'form-horizontal', 
                'files' => true
              ]) !!}

              <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                  {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
              </div>

              <hr>

              <div class="form-group row">
                {!! Form::label('role', 'Attach Permissions', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
@foreach ($permissions as $groupings => $permissions)
                  <div class="col-sm" style="padding-top: 8px">
                    <strong>{!! Form::label($groupings, $groupings) !!}</strong>
@foreach ($permissions as $permission)
                    <div class="checkbox abc-checkbox abc-checkbox-info">
                      {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'chkbx' . $permission->id,'class' => 'styled']) !!}
                      <label for="chkbx{{ $permission->id }}">
                        {{ $permission->item_order }} {{ ucfirst($permission->label) }}
                      </label>
                    </div>
@endforeach
                  </div><!-- /.col-sm -->
@endforeach
              </div><!-- /.form-group row -->

              <hr>

              <div class="row">
                <div class="offset-md-2 col-md-4">
                  {{ Form::button('<i class="fa fa-dot-circle-o"></i> Create User', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                  <a href="{{ route('app.settings.roles.index') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
                </div>
              </div>

              {!! Form::close() !!}

            </div><!-- ./card-body-->

            <div class="card-footer">
              Add Role form
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection

@push('head_scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.0/awesome-bootstrap-checkbox.min.css" rel="stylesheet" type="text/css"/>
@endpush