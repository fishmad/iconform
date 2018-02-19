@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.roles.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>View</strong> Role
                <small>
                  {{ $role->name }}
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              {{--  <table class="table table-responsive-sm">
                <thead>
                  <tr class="table-secondary">
                    <th>Label</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td>{{ $role->id }}</td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>{{ $role->name }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <h3>
                        Assigned Permissions
                      </h3>
                    </td>
                  </tr>
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
              </table>  --}}





              <div class="col-md-12">
                  
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active show" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true">
                        <i class="icon-info"></i> Role info
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#roles" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="icon-lock"></i> Permissions attached to Role 
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#users" role="tab" aria-controls="messages" aria-selected="false">
                        <i class="icon-people"></i> Users that have this Role
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
                            <td>{{ $role->id }}</td>
                          </tr>
                          <tr>
                            <th scope="row">name</th>
                            <td>{{ $role->name }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!-- /usersdetails TAB -->
  
  
                    <div class="tab-pane" id="roles" role="tabpanel">
                      <table class="table table-striped table-bordered table-hover table-responsive-sm">
                        <thead>
                          <tr>
                            <th scope="col" colspan="2">Details</th>
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
                    </div><!-- /#roles TAB -->
  
  
                    <div class="tab-pane" id="users" role="tabpanel">
                      <table class="table table-striped table-bordered table-hover table-responsive-sm">
                        <thead>
                          <tr>
                            <th scope="col">Label</th>
                            <th scope="col">Details</th>
                          </tr>
                        </thead>
                        <tbody>
@if(!$users->isEmpty())
@foreach ($users as $user)
                          <tr>
                            <th scope="row">User {{ $user->id }}</th>
                            <td>{{ ucfirst($user->name) }}</td>
                          </tr>
                          <tr>
@endforeach
@endif
                        </tbody>
                      </table>
                    </div><!-- /#users TAB -->


                  </div><!-- /.tab-content -->
                </div><!-- /.col-md-12 -->
              </div><!-- ./card-body-->

            <div class="card-footer">
              Role details
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection
