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

              <table class="table table-responsive-sm">
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
              </table>

            </div><!-- ./card-body-->

            <div class="card-footer">
              Role details
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection
