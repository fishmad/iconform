@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.users.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Edit User</strong> {{ $user->name }}
                <small>
                  To edit the user record, modify the form details below and submit changes.
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              {{ Form::model($user, [
                'method' => 'PUT',
                'route' => ['app.settings.users.update', $user->id], 
                'class' => 'form-horizontal',
                'files' => true
              ]) }}

              <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                  {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
                </div>
              </div>

              <div class="form-group row {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                  {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
              </div>

              <div class="form-group row">
                {!! Form::label('password', 'Password', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Leave blank to keep current password.']) !!}
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              {{--  <hr />

              <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                {!! Form::label('role', 'Roles', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                @if(!$roles->isEmpty())
                  @foreach ($roles as $role) 
                  <div class="checkbox">
                    <label>
                      {{ Form::checkbox('roles[]', $role->id, $user->roles) }}
                      {{ ucfirst($role->name) }}
                    </label>
                  </div>
                  @endforeach
                @endif
                </div>
              </div>  --}}


              <hr>

              <div class="form-group row">
                {!! Form::label('role', 'Roles', ['class' => 'col-md-3 col-lg-2 col-form-label iconform-chklabel']) !!}
                <div class="col-md-9 col-lg-10">
@if(!$roles->isEmpty())
@foreach ($roles as $role)
                  <div class="form-check abc-checkbox abc-checkbox-info">
                    {!! Form::checkbox('roles[]', $role->id, null, ['id' => 'checkbox' . $role->id,'class' => 'form-check-input']) !!}
                    <label class="form-check-label" for="checkbox{{ $role->id }}">
                      {{ ucfirst($role->name) }}
                    </label>
                  </div>
@endforeach
@endif
                </div><!-- /.col-md-9.col-lg-8 -->
              </div><!-- /.form-group row -->



              <hr />

              <div class="form-group row">
                <div class="offset-md-3 offset-lg-2 col">
                  {{ Form::button('<i class="fa fa-dot-circle-o"></i> Update Record', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                  <a href="{{ route('app.settings.users.index') }}" class="btn btn-danger" title="Back">
                    <i class="fa fa-ban"></i> Cancel
                  </a>
                </div>
              </div>

              {{ Form::close() }}

            </div><!-- ./card-body-->

            <div class="card-footer">
              Edit user form
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection

@push('head_scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/awesome-bootstrap-checkbox/1.0.0/awesome-bootstrap-checkbox.min.css" rel="stylesheet" type="text/css"/>
@endpush