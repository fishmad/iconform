          <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
            <div class="col-md-9 col-lg-8">
              {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
              {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
              <span class="help-block">Lowercase is better</span>
            </div>
          </div>

          <hr>

          <div class="form-group row">
              {!! Form::label('role', 'Attach Permissions', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
@foreach ($permissions as $groupings => $permissions)
                <div class="col-sm" style="padding-top: 8px">
                  <strong>{!! Form::label($groupings, $groupings) !!}</strong>
@foreach ($permissions as $permission)
                  <div class="form-check abc-checkbox abc-checkbox-info">
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['id' => 'checkbox' . $permission->id,'class' => 'form-check-input']) !!}
                    <label class="form-check-label" for="checkbox{{ $permission->id }}">
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
                {{ Form::button('<i class="fa fa-dot-circle-o"></i> Update Role', ['type' => 'submit', 'class' => 'btn btn-primary'] ) }}
                <a href="{{ route('roles.index') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
              </div>
            </div>
