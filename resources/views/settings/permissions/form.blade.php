                          <div class="form-group row {{ $errors->has('groupings') ? 'has-error' : ''}}">
                            {!! Form::label('groupings', 'Permission belongs to group', ['class' => 'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                              {!! Form::text('groupings', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
                              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                          </div>
												
                          <div class="form-group row {{ $errors->has('groupings_order') ? 'has-error' : ''}}">
                            {!! Form::label('groupings_order', 'Permission group order', ['class' => 'col-md-3 col-form-label']) !!}
                            <div class="col-sm-3 col-md-2 col-lg-2">
                              {!! Form::number('groupings_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
                              {!! $errors->first('order', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                          </div>

                          <div class="form-group row {{ $errors->has('label') ? 'has-error' : ''}}">
                            {!! Form::label('label', 'Name of this permission', ['class' => 'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                              {!! Form::text('label', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['id' => 'label', 'class' => 'form-control is-invalid']) !!}
                              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                          </div>

                          <div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
                            {!! Form::label('name', 'Code name of permission ', ['class' => 'col-md-3 col-form-label']) !!}
                            <div class="col-md-9">
                              {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['id' => 'name', 'class' => 'form-control is-invalid']) !!}
                              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                          </div>

                          <div class="form-group row {{ $errors->has('item_order') ? 'has-error' : ''}}">
                            {!! Form::label('item_order', 'Permission order in group', ['class' => 'col-md-3 col-form-label']) !!}
                            <div class="col-sm-3 col-md-2 col-lg-2">
                              {!! Form::number('item_order', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control is-invalid']) !!}
                              {!! $errors->first('title', '<span class="invalid-feedback">:message</span>') !!}
                            </div>
                          </div>

                          <hr>

                          <div class="form-group row {{ $errors->has('role') ? 'has-error' : ''}}">
                            {!! Form::label('role', 'Permission is attached to Roles', ['class' => 'col-md-3 col-form-label']) !!}
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
                            <div class="offset-md-3 col-md-9">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                            </div>
                          </div>
