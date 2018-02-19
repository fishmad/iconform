@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.settings.roles.create') }}" class="btn btn-outline-primary float-right">
                Create Roles
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Roles</strong> List
                <small>
                  Create, read, update and delete roles from this screen.
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">
              <table class="table table-responsive-sm table-bordered">
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

                    <a href="{{ url('/app/settings/roles/' . $item->id) }}" title="View Sample"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/app/settings/roles/' . $item->id . '/edit') }}" title="Edit Sample"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                      'method'=>'DELETE',
                      'url' => ['/app/settings/roles', $item->id],
                      'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-sm',
                      'title' => 'Delete Sample',
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
              Roles list
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection


@push('scripts')
  <script>
    function confirmDel() {
      event.preventDefault(); // prevent form submit
      var form = event.target.form; // storing the form
      swal({
        title: "Are you sure?",
        text: "You will not be able to recovery this record.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          form.submit();          // submitting the form when user press yes
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
    }
  </script>

  <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.12.3/dist/sweetalert2.all.js"></script>
@endpush
