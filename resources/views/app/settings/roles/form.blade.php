          <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
            {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-form-label']) !!}
            <div class="col-md-4">
              {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
              {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
              <span class="help-block">Lowercase is better</span>
            </div>
          </div>
          <hr>
          <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
            {!! Form::label('role', 'Role has these permissions', ['class' => 'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
              <div class="row">
              @foreach ($permissions as $groupings => $permissions)
              <div class="col-sm">
                <h6>{{ $groupings }}</h6> 
                @foreach ($permissions as $permission)
                <div class="checkbox">
                  <label>
                  {{ Form::checkbox('permissions[]', $permission->id ) }}
                  {{ $permission->item_order }} {{ ucfirst($permission->label) }}
                  </label>
                </div>
                @endforeach
              </div><!-- /.col-sm -->
              @endforeach
              </div><!-- /.row -->
            </div><!-- /.col-md-9 -->
          </div><!-- /.form-group row -->
          <div class="form-group row">
            <div class="offset-md-3 col-md-4">
              {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>