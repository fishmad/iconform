@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.permissions.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Show</strong> Permission
                <small>
                    Permission: {{ $permission->name }}
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
                      <td>{{ $permission->id }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Name</th>
                      <td>{{ $permission->name }}</td>
                    </tr>
                    <tr>
                      <th scope="row">Permissions</th>
                      <td>TBA</td>
                    </tr>
                    <tr>
                      <th scope="row">Roles permissions</th>
                      <td>TBA</td>
                    </tr>
                  </tbody>
                </table>

            </div><!-- ./card-body-->

            <div class="card-footer">
              Permission details
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection
