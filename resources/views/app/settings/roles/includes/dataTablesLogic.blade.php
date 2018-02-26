@push('scripts')
  <!-- DataTables Logic -->
  <script>
    $(function() {
      $('#datatable').DataTable({
        {{--  serverSide: true,  --}}
        processing: true,
        responsive: true,
        colReorder: true,
        lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
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
        ajax: '{!! url('app/settings/roles/datatables') !!}',
        columns: [
@foreach ($columns as $tbl_fields => $table_cell)
@if ($table_cell === "created_at" || $table_cell === "updated_at" || $table_cell === "password" || $table_cell === "remember_token" )
@else
          { data: '{!! $table_cell !!}', name: '{!! $table_cell !!}' },
@endif
@endforeach
          // { data: 'roles[, ].name'},
          { data: 'action', name: 'action', "sClass": "text-md-right text-lg-right", orderable: false, searchable: false }
        ],
        order: [[0, 'asc']],
      });
    });	
  </script><!-- /.DataTables Logic -->

@endpush