@extends('layouts.master')

@section('content')

<div class="container">
    <div class="animate fadeIn">

        <div class="card">

            <div class="card-header">
                <a href="{{ route('incidents.create') }}" class="btn btn-outline-primary float-right">Create</a>
                <h2><i class="fa fa-align-justify"></i> <strong>{{ str_singular('Incidents') }} </strong> Register 
                    <small>
                        Create, read, update and delete {{ str_plural('Incidents') }} from this screen.
                    </small>
                </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

                <table id="datatable" data-toggle="dataTable" data-form="deleteForm" class="table table-responsive-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            @foreach ($columns as $tbl_headers => $table_title)
                            @if ($table_title === "created_at" || $table_title === "updated_at" || $table_title === "password" || $table_title === "remember_token" )
                            @else
                            <th>{{ str_replace('_', ' ', title_case(($table_title))) }}</th>
                            @endif
                            @endforeach
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div><!-- ./card-body-->

            <div class="card-footer">
            {{ ucwords('Incident') }} List
            </div>

        </div><!-- ./card-->
    </div><!-- ./animate fadeIn-->

</div><!-- ./container || container-fluid-->

@endsection

@push('head_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>
@endpush

@push('scripts')
<!-- DataTables Logic -->
<script>
    $(function() {
        $('#datatable').DataTable({
            processing: true,
            responsive: true,
            colReorder: true,
            lengthMenu: [[10, 5, 15, 25, 50, 100, 500, -1], [10, 5, 15, 25, 50, 100, 500, "All"]],
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

            ajax: '{!! url('incidents/datatables') !!}',

            columns: [
                @foreach ($columns as $tbl_fields => $table_cell)
                    @if ($table_cell === "created_at" || $table_cell === "updated_at" || $table_cell === "password" || $table_cell === "remember_token" )
                    @else
                    { data: '{!! $table_cell !!}', name: '{!! $table_cell !!}' },
                    @endif
                @endforeach
                { data: 'action', name: 'action', "sClass": "text-md-right text-lg-right", orderable: false, searchable: false }
            ],
            order: [[0, 'asc']],
        });
    });	
</script><!-- /.DataTables Logic -->

@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.js"></script>
    {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.11/sweetalert2.all.js"></script>  --}}
    <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.12.12/dist/sweetalert2.all.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
@endpush