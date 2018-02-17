@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="row justify-content-md-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header">Add New Role</div>
                  <div class="card-body">
                  {{--  <a href="{{ url('/app/settings/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                  <br />
                  <br />  --}}
                  @if ($errors->any())
                  <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  @endif

                  {!! Form::open(['url' => '/app/settings/roles', 'class' => 'form-horizontal', 'files' => true]) !!}
                  
                  {{--  @include ('app.settings.roles.form')  --}}

                  <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
                    {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-form-label']) !!}
                    <div class="col-md-4">
                      {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                      {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                      <span class="help-block">Lowercase is better</span>
                    </div>
                  </div>

                  <hr>

                  {{--  <div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
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
                  </div><!-- /.form-group row -->  --}}
                  
                  @if(!$permissions->isEmpty())
                    <h4>Assign Permissions</h4>
                    @foreach ($permissions as $permission)
                      {{ Form::checkbox('permissions[]',  $permission->id ) }}
                      {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                  @endif

                  <div class="form-group row">
                    <div class="offset-md-3 col-md-4">
                      {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                  </div>

                  {!! Form::close() !!}

                </div><!-- ./card-body-->
              </div><!-- ./card-->
            </div><!-- ./col-md-11-->.
          </div><!-- ./row justify-content-md-center -->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection
