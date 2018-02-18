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

              <table class="table table-responsive-sm">
                <thead>
                  <tr class="table-secondary">
                    <th>Label</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">DB ID</th>
                    <td>{{ $user->id }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Name</th>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Date Registered</th>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Last Updated</th>
                    <td>{{ $user->updated_at->format('F d, Y h:ia') }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Roles</th>
                    <td>{{ $user->roles()->pluck('name')->implode('; ') }}</td>
                  </tr>
                  <tr>
                    <th scope="row">Permissions</th>
                    <td>TBA</td>
                  </tr>
                </tbody>
              </table>

            </div><!-- ./card-body-->

            <div class="card-footer">
              User details
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection