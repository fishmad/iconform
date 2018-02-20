@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
            
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.registers.samples.create') }}" class="btn btn-outline-primary float-right">
                Create a new Record
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Samples</strong> Register 
                <small>
                  Modals are streamlined, but flexible, dialog prompts with the minimum required functionality and smart defaults.
                </small>
              </h2>
            </div>

            <div class="card-body">

              <table id="datatable" class="table table-responsive-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
@foreach ($dbFields as $dbField => $name)
@if ($name === "created_at" || $name === "updated_at" || $name === "id" || $name === "description" || $name === "image"  )
@else
                    <th>{{ ucfirst($name) }}</th>
@endif
@endforeach
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container || container-fluid-->
@endsection

@push('head_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>
@endpush

@push('scripts')
  <script>
    $(function() {
      $('#datatable').DataTable({
        {{--  serverSide: true,  --}}
        processing: true,
        responsive: true,
        colReorder: true,
        lengthMenu: [[5, 10, 25, 50, 100, 500, -1], [5, 10, 25, 50, 100, 500, "All"]],
        {{--  pagingType: "simple_numbers",  --}}
        pagingType: "numbers",

        dom:
          "<'row'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 text-center'l><'col-sm-12 col-md-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        buttons: [
          {{--  {
            "text": '<i class="fa fa-plus-square-o"></i> New Record',
            "className": 'btn-outline-primary btn-sm',
              action: function ( e, dt, node, config ) {
                window.location = '/registers/samples/create';
              },
          },  --}}
          {{--  { 
            "extend": 'copy', 
            "text":'<i class="fa fa-copy"></i> Copy',
            "className": 'btn-outline-primary btn-sm'
          },  --}}
          { 
            "extend": 'excel', 
            "text":'<i class="fa fa-file-excel-o"></i> Excel',
            "className": 'btn-outline-primary btn-sm'
          },
          { 
            "extend": 'csv', 
            "text":'<i class="fa fa-file-text-o"></i> CSV',
            "className": 'btn-outline-primary btn-sm'
          },
          { 
            "extend": 'pdf', 
            "text":'<i class="fa fa-file-pdf-o"></i> PDF',
            "className": 'btn-outline-primary btn-sm'
          },
          { 
            "extend": 'print', 
            "text":'<i class="fa fa-print"></i> Print',
            "className": 'btn-outline-primary btn-sm'
          }
        ],

        ajax: '{!! url('app/registers/samples/datatables') !!}',
        columns: [
@foreach ($dbFields as $dbField => $name)
@if ($name === "created_at" || $name === "updated_at" || $name === "id" || $name === "description" || $name === "image" )
@else
          { data: '{!! $name !!}', name: '{!! $name !!}' },
@endif
@endforeach
          { data: 'action', name: 'action', orderable: false, searchable: false }
        ],

        order: [[0, 'asc']],

      });
    });	
  </script>

  <script>
    $('#datatable').on('click', '.btn-delete[data-remote]', function (e) { 
      e.preventDefault();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var url = $(this).data('remote');
      // confirm then
      if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
          url: url,
          type: 'DELETE',
          dataType: 'json',
          data: {method: '_DELETE', submit: true}
        }).always(function (data) {
          $('#datatable').DataTable().draw();
        });
      } else
        alert("You have cancelled!");
    });
  </script>

  <script type="text/javascript" src="{{ asset('js/iconform/sweetalert.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.11/sweetalert2.all.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.js"></script>
@endpush