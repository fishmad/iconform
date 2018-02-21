@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.users.create') }}" class="btn btn-outline-primary float-right">
                Create User
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Users</strong> List
                <small>
                  Create, read, update and delete users from this screen.
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">
              <table class="table table-responsive-sm table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
@foreach($users as $item)
                  <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
@foreach($item->roles()->pluck('name') as $roles )
                      <span class="badge badge-info">{{ $roles }}</span>
@endforeach
                      {{-- <span class="badge badge-success">{{ $item->roles()->pluck('name')->implode('; ') }}</span> --}}
                    </td>
                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td class="text-right">
                      <a href="{{ url('/app/settings/users/' . $item->id) }}" title="View Sample"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="{{ url('/app/settings/users/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      {!! Form::open([
                          'method'=>'DELETE',
                          'url' => ['/app/settings/users', $item->id],
                          'style' => 'display:inline'
                      ]) !!}
                      {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete User',
                      'onclick'=>'confirmDel()'
                      )) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
@endforeach
                </tbody>
              </table>
            </div><!-- ./card-body-->

            <div class="card-footer">
              Users list
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/iconform/sweetalert.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.11/sweetalert2.all.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
@endpush