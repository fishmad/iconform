@push('scripts')
  <!-- DataTables Logic -->
  <script>
    $(function() {
      $('#datatable').DataTable({
        {{--  serverSide: true,  --}}
        processing: true,
        responsive: true,
        colReorder: true,
        lengthMenu: [[5, 10, 25, 50, 100, 500, -1], [5, 10, 25, 50, 100, 500, "All"]],
        pagingType: "numbers",

        dom:
          "<'row'<'col-sm-12 col-md-4'B><'col-sm-12 col-md-4 text-center'l><'col-sm-12 col-md-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
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
@if ($name === "created_at" || $name === "updated_at" || $name === "description" || $name === "image" )
@else
          { data: '{!! $name !!}', name: '{!! $name !!}' },
@endif
@endforeach
          { data: 'action', name: 'action', "sClass": "text-md-right text-lg-right", orderable: false, searchable: false }
        ],
        order: [[0, 'asc']],
      });
    });	
  </script><!-- /.DataTables Logic -->

@endpush