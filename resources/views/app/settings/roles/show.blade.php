@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Role {{ $role->id }}
              <div class="card-actions">
                <a href="#" class="btn-minimize"><i class="icon-arrow-down"></i></a>
                <a href="#" class="btn-close"><i class="icon-close"></i></a>
              </div>
            </div>
            <div class="card-body">
              <a href="{{ url('/app/settings/roles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
              <a href="{{ url('/app/settings/roles/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
              {!! Form::open([
                'method'=>'DELETE',
                'url' => ['settings/roles', $role->id],
                'style' => 'display:inline'
              ]) !!}
              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                'type' => 'submit',
                'class' => 'btn btn-danger btn-xs',
                'title' => 'Delete Role',
                'onclick'=>'return confirm("Confirm delete?")'
              ))!!}
              {!! Form::close() !!}
              
              <br/>
              <br/>

              <table class="table table-responsive-sm table-s">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <td>{{ $role->id }}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td>{{ $role->name }}</td>
                  </tr>
                </tbody>
              </table>

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
