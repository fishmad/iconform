@extends('layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('permissions.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Show</strong> Permission
                <small>
                  {{ $permission->name }}
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              <div class="col-md-12">
                  
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#details" role="tab" aria-controls="home" aria-selected="true">
                      <i class="icon-info"></i> Permission info
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#roles" role="tab" aria-controls="profile" aria-selected="false">
                      <i class="icon-lock"></i> Roles attached to this permission
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#users" role="tab" aria-controls="messages" aria-selected="false">
                      <i class="icon-people"></i> Users sharing this permission
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
                          <td>{{ $permission->id }}</td>
                        </tr>
                        <tr>
                          <th scope="row">name</th>
                          <td><a href="{{ url('permissions/' . $permission->id . '/edit') }}">{{ $permission->name }}</a></td>
                        </tr>
                        <tr>
                          <th scope="row">label</th>
                          <td>{{ $permission->label }}</td>
                        </tr>
                        <tr>
                          <th scope="row">item_order</th>
                          <td>{{ $permission->item_order }}</td>
                        </tr>
                        <tr>
                          <th scope="row">groupings</th>
                          <td>{{ $permission->groupings }}</td>
                        </tr>
                        <tr>
                          <th scope="row">groupings_order</th>
                          <td>{{ $permission->groupings_order }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /usersdetails TAB -->


                  <div class="tab-pane" id="roles" role="tabpanel">
                    <table class="table table-striped table-bordered table-hover table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col">Label</th>
                          <th scope="col">Details</th>
                        </tr>
                      </thead>
                      <tbody>
@if(!$roles->isEmpty())
@foreach ($roles as $role)
                        <tr>
                          <th scope="row">Role {{ $role->id }}</th>
                          <td><a href="{{ url('roles/' . $role->id . '/edit') }}">{{ ucfirst($role->name) }}</a></td>
                        </tr>
                        <tr>
@endforeach
@endif
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
                          <td><a href="{{ url('users/' . $user->id . '/edit') }}">{{ ucfirst($user->name) }}</a></td>
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
              Permission info
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection
