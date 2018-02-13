@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">
              User Administration
            </div>
            <div class="card-body">
              <a href="{{ url('/settings/permissions/create') }}" class="btn btn-success btn-sm" title="Add New Sample">
                  <i class="fa fa-plus" aria-hidden="true"></i> Add New
              </a>
              <br/>
              <br/>
              <table class="table table-responsive-sm table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Label</th>
                    <th>Item Order</th>
                    <th>Groupings</th>
                    <th>Grouping Order</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($permissions as $item)
                <tr>
                  <td>{{ $loop->iteration or $item->id }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->label }}</td>
                  <th>{{ $item->item_order }}</th>
                  <th>{{ $item->groupings }}</th>
                  <th>{{ $item->groupings_order }}</th>
                  <td class="text-right">
                    <a href="{{ url('/settings/permissions/' . $item->id) }}" title="View Sample"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/settings/permissions/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                      'method'=>'DELETE',
                      'url' => ['/settings/permissions', $item->id],
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
