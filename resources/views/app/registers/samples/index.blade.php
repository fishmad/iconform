@extends('_layouts.master')

@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">

          @include('app.registers.samples.includes.confirmModal')

          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.registers.samples.create') }}" class="btn btn-outline-primary float-right">
                Create a new Record
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Samples</strong> Register 
                <small>
                  Create, read, update and delete samples from this screen.
                </small>
              </h2>
            </div>

            <div class="card-body">

              <table id="datatable" data-toggle="dataTable" data-form="deleteForm" class="table table-responsive-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
@foreach ($dbFields as $dbField => $name)
@if ($name === "created_at" || $name === "updated_at" || $name === "description" || $name === "image"  )
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

            <div class="card-footer">
              Samples list
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->

      </div><!-- ./container || container-fluid-->

@endsection

@push('head_scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.css"/>
@endpush

@include('app.registers.samples.includes.dataTablesLogic')

@push('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/r-2.2.1/rg-1.0.2/sl-1.2.5/datatables.min.js"></script>
  {{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.12.11/sweetalert2.all.js"></script>  --}}
  <script type="text/javascript" src="https://unpkg.com/sweetalert2@7.12.12/dist/sweetalert2.all.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
@endpush