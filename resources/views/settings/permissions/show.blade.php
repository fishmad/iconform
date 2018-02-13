@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Permission: {{ $permission->name }}
              <div class="card-actions">
                <a href="#" class="btn-minimize"><i class="icon-arrow-down"></i></a>
                <a href="#" class="btn-close"><i class="icon-close"></i></a>
              </div>
            </div>
            <div class="card-body">
              <div class="col-md-12">
                <a href="{{ url('/settings/permissions') }}" class="btn btn-secondary" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                <a href="{{ url('/settings/permissions/' . $permission->id . '/edit') }}" class="btn btn-secondary" title="Edit Permission"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>                       
                  {!! Form::open([
                    'method'=>'DELETE',
                    'url' => ['settings/permissions/', $permission->id],
                  ]) !!}
                  {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                    'type' => 'submit',
                    'class' => 'btn btn-secondary',
                    'title' => 'Delete Permission',
                    'onclick'=>'return confirm("Confirm delete?")'
                  ))!!}
                    {!! Form::close() !!}
                </div>
              <table class="table table-responsive-sm table-s">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <td>{{ $permission->id }}</td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td>{{ $permission->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
