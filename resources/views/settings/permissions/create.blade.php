@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Add New Permission
              <div class="card-actions">
                <a href="#" class="btn-minimize"><i class="icon-arrow-down"></i></a>
                <a href="#" class="btn-close"><i class="icon-close"></i></a>
              </div>
            </div>
            <div class="card-body">
              @if ($errors->any())
              <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              @endif

              {!! Form::open(['url' => '/admin/permissions', 'class' => 'form-horizontal', 'files' => true]) !!}

                <div class="form-group row {{ $errors->has('groupings') ? 'has-error' : ''}}">
                  {!! Form::label('groupings', 'Permission belongs to group', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::text('groupings', null, ('required' == 'required') ? ['placeholder' => 'Articles', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'Article Management', 'class' => 'form-control is-invalid']) !!}
                    {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                  </div>
                </div>

                <div class="form-group row {{ $errors->has('groupings_order') ? 'has-error' : ''}}">
                  {!! Form::label('groupings_order', 'Permission group order', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-sm-3 col-md-2 col-lg-2">
                    {!! Form::number('groupings_order', null, ('required' == 'required') ? ['placeholder' => '7', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => '7', 'class' => 'form-control is-invalid']) !!}
                    {!! $errors->first('order', '<span class="invalid-feedback">:message</span>') !!}
                  </div>
                </div>

                <div class="form-group row {{ $errors->has('label') ? 'has-error' : ''}}">
                  {!! Form::label('label', 'Name of this permission', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::text('label', null, ('required' == 'required') ? ['placeholder' => 'Manage Articles & Posts', 'id' => 'label', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'Manage Articles', 'id' => 'label', 'class' => 'form-control is-invalid']) !!}
                    {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                  </div>
                </div>

                <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                  {!! Form::label('name', 'Code name of permission ', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    {!! Form::text('name', null, ('required' == 'required') ? ['placeholder' => 'manage_articles___posts', 'id' => 'name', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => 'manage_articles___posts', 'id' => 'name', 'class' => 'form-control is-invalid']) !!}
                    {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                    <span class="help-block">This code is used in controllers for auth gate checking permissions</span>
                  </div>
                </div>

                <div class="form-group row {{ $errors->has('item_order') ? 'has-error' : ''}}">
                  {!! Form::label('item_order', 'Order of permission', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-sm-3 col-md-2 col-lg-2">
                    {!! Form::number('item_order', null, ('required' == 'required') ? ['placeholder' => '0', 'class' => 'form-control', 'required' => 'required'] : ['placeholder' => '0', 'class' => 'form-control is-invalid']) !!}
                    {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                  </div>
                </div>

                <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
                  {!! Form::label('role', 'Assigned to what roles?', ['class' => 'col-md-3 col-form-label']) !!}
                  <div class="col-md-9">
                    @if(!$roles->isEmpty())
                    @foreach ($roles as $role) 
                    <div class="checkbox">
                      <label>
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ ucfirst($role->name) }}
                      </label>
                    </div>
                    @endforeach
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-md-3 col-md-4">
                    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                  </div>
                </div>

              {!! Form::close() !!}

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
@push('scripts')
<script type="text/javascript">
  $('#label').change(function() {
    $('#name').val($(this).val().toLowerCase().replace(/[^a-z]/g, '_'));
})
</script>
@endpush
