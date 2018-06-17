@extends('layouts.master')

@section('content')

<div class="container">
    <div class="animate fadeIn">
        <div class="card">

            <div class="card-header">
                <a href="{{ url()->previous() }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right"><i class="fa fa-arrow-left"></i> Back</a>
                <h2><i class="fa fa-align-justify"></i> <strong>Show</strong> Incident {{ $incidents->id }}
                    <small>
                    {{ $incidents->name }}{{ $incidents->title }} #{{ $incidents->id }}
                    </small>
                </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>ID</th><td>{{ $incidents->id }}</td>
                            </tr>
                                <tr><th> Title </th><td> {{ $incident->title }} </td></tr><tr><th> Description </th><td> {{ $incident->description }} </td></tr><tr><th> Incident Type </th><td> {{ $incident->incident_type }} </td></tr>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->

            </div><!-- ./card-body-->

            <div class="card-footer">
                Diplay Incident
            </div>

        </div><!-- ./card-->
    </div><!-- ./animate fadeIn-->
</div><!-- ./container-fluid-->

@endsection