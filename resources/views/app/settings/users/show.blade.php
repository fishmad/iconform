@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.users.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Show</strong> User
                <small>
                    {{ $user->name }}
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">
              <div class="col-md-12">

                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true">
                      <i class="icon-info"></i> User info
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#roles" role="tab" aria-controls="profile" aria-selected="false">
                      <i class="icon-lock"></i> User has Roles 
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#users" role="tab" aria-controls="messages" aria-selected="false">
                      <i class="icon-people"></i> Roles have Permissions
                    </a>
                  </li>
                </ul>

                <div class="tab-content">

                  <div class="tab-pane active show" id="details" role="tabpanel">
                    <table class="table table-striped table-bordered table-hover table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col">Label</th>
                          <th scope="col">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">id</th>
                          <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                          <th scope="row">name</th>
                          <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                          <th scope="row">email</th>
                          <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                          <th scope="row">created_at</th>
                          <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        </tr>
                        <tr>
                          <th scope="row">updated_at</th>
                          <td>{{ $user->updated_at->format('F d, Y h:ia') }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /usersdetails TAB -->

                  <div class="tab-pane" id="roles" role="tabpanel">
                    <table class="table table-striped table-bordered table-hover table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col" colspan="2">Roles</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="2">
                            <div class="form-group row">
@foreach ($roles as $role)
                              <div class="col-sm">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">
                                  {{ ucfirst($role) }}
                                  </li>
                                </ul><!-- /.list-group.list-group-flush -->
                              </div>
@endforeach
                              </div><!-- /.form-group row -->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /#roles TAB -->

                  <div class="tab-pane" id="users" role="tabpanel">
                    <table class="table table-striped table-bordered table-hover table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col" colspan="2">Permissions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="2">
                            <div class="form-group row">
@foreach ($permissions as $groupings => $permissions)
                              <div class="col-sm">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item">
                                    <strong>{!! Form::label($groupings, $groupings) !!}</strong>
                                  </li>
@foreach ($permissions as $permission)
                                  <li class="list-group-item">
                                    {{ $permission->item_order }} {{ ucfirst($permission->label) }}
                                  </li>
@endforeach
                                </ul><!-- /.list-group.list-group-flush -->
                              </div>
@endforeach
                            </div><!-- /.form-group row -->
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /#users TAB -->

                </div><!-- /.tab-content -->
              </div><!-- /.col-md-12 -->
            </div><!-- ./card-body-->

            <div class="card-footer">
              User details
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection