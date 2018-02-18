          <div class="form-group row {{ $errors->has('groupings') ? 'has-error' : ''}}">
            {!! Form::label('groupings', 'Group', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-md-9 col-lg-8">
              {!! Form::text('groupings', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
            </div>
          </div>
        
          <div class="form-group row {{ $errors->has('groupings_order') ? 'has-error' : ''}}">
            {!! Form::label('groupings_order', 'Group order', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-sm-3 col-md-2 col-lg-2">
              {!! Form::number('groupings_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
              {!! $errors->first('order', '<span class="invalid-feedback">:message</span>') !!}
            </div>
          </div>

          <div class="form-group row {{ $errors->has('label') ? 'has-error' : ''}}">
            {!! Form::label('label', 'Permission label', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-md-9 col-lg-8">
              {!! Form::text('label', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['id' => 'label', 'class' => 'form-control is-invalid']) !!}
              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
            </div>
          </div>

          <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Permission Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-md-9 col-lg-8">
              {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['id' => 'name', 'class' => 'form-control is-invalid']) !!}
              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
            </div>
          </div>

          <div class="form-group row {{ $errors->has('item_order') ? 'has-error' : ''}}">
            {!! Form::label('item_order', 'Order in group', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-sm-3 col-md-2 col-lg-2">
              {!! Form::number('item_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
            </div>
          </div>

          <hr>

          <div class="form-group row">
            {!! Form::label('role', 'Attached to Roles', ['class' => 'col-md-3 col-lg-2 col-form-label iconform-chklabel']) !!}
            <div class="col-md-9 col-lg-10">
@if(!$roles->isEmpty())
@foreach ($roles as $role)
              <div class="form-check abc-checkbox abc-checkbox-info checkbox-inline">
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