@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.permissions.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Create</strong> Permission 
                <small>
                  To add a new permission record, complete the form details below and press submit to save your data.
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
                'url' => '/app/settings/permissions', 
                'class' => 'form-horizontal', 
                'files' => true
              ]) !!}

              <div class="form-group row {{ $errors->has('groupings') ? 'has-error' : ''}}">
                {!! Form::label('groupings', 'Permission group', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('groupings', null, ('required' == 'required') ? ['placeholder' => 'Articles', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'Article Management', 'class' => 'form-control is-invalid']) !!}
                  {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                </div>
              </div>

              <div class="form-group row {{ $errors->has('groupings_order') ? 'has-error' : ''}}">
                {!! Form::label('groupings_order', 'Group order', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-sm-3 col-md-2 col-lg-2">
                  {!! Form::number('groupings_order', null, ('required' == 'required') ? ['placeholder' => '7', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => '7', 'class' => 'form-control is-invalid']) !!}
                  {!! $errors->first('order', '<span class="invalid-feedback">:message</span>') !!}
                </div>
              </div>

              <div class="form-group row {{ $errors->has('label') ? 'has-error' : ''}}">
                {!! Form::label('label', 'Permission label', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('label', null, ('required' == 'required') ? ['placeholder' => 'Manage Articles & Posts', 'id' => 'label', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'Manage Articles', 'id' => 'label', 'class' => 'form-control is-invalid']) !!}
                  {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                </div>
              </div>

              <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Permission name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-md-9 col-lg-8">
                  {!! Form::text('name', null, ('required' == 'required') ? ['placeholder' => 'manage_articles___posts', 'id' => 'name', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'manage_articles___posts', 'id' => 'name', 'class' => 'form-control is-invalid']) !!}
                  {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                  <span class="help-block">This code is used in controllers for auth gate checking permissions</span>
                </div>
              </div>

              <div class="form-group row {{ $errors->has('item_order') ? 'has-error' : ''}}">
                {!! Form::label('item_order', 'Order in group', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
                <div class="col-sm-3 col-md-2 col-lg-2">
                  {!! Form::number('item_order', null, ('required' == 'required') ? ['placeholder' => '0', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => '0', 'class' => 'form-control is-invalid']) !!}
                  {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                </div>
              </div>

              <hr>

              <div class="form-group row">
                {!! Form::label('role', 'Attach to roles', ['class' => 'col-md-3 col-lg-2 col-form-label iconform-chklabel']) !!}
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

              <hr>

              <div class="row">
                <div class="offset-md-2 col-md-4">
                  {{ Form::button('<i class="fa fa-dot-circle-o"></i> Create Permission', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                  <a href="{{ route('app.settings.permissions.index') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
                </div>
              </div>

              {!! Form::close() !!}

            </div><!-- /.card-body -->

            <div class="card-footer">
              Add permission form
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
    $('#label').change(function() {
      $('#name').val($(this).val().toLowerCase().replace(/[^a-z]/g, '_'));
  })
</script>
@endpush