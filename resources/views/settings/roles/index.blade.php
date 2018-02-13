@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">User Roles</div>

            <div class="card-body">

              <div class="col-md-6 btn-toolbar">
                <a href="{{ route('settings.permissions.index') }}" class="btn btn-xs btn-default pull-right">Permissions</a></h1>
                <a href="{{ route('settings.roles.index') }}" class="btn btn-xs btn-primary pull-right">Roles</a>
                <a href="{{ route('settings.users.index') }}" class="btn btn-xs btn-default pull-right">Users</a>
              </div>
              <a href="{{ url('/settings/roles/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New
              </a>

{{--  
              {!! Form::open(['method' => 'GET', 'url' => '/settings/roles', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
              <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              {!! Form::close() !!}
  --}}

              <br/>
              <br/>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Roles</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $item)
                  <tr>
                    <td>{{ $loop->iteration or $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-right">
                      <a href="{{ url('/settings/roles/' . $item->id) }}" title="View Sample"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                      <a href="{{ url('/settings/roles/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                      {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['/settings/roles', $item->id],
                        'style' => 'display:inline'
                      ]) !!}
                      {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Delete Sample',
                        'onclick'=>'return confirm("Confirm delete?")'
                      )) !!}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{--<div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>--}}
            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection
