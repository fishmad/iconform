@extends('layouts.master')

@section('content')

<div class="container">
    <div class="animate fadeIn">
        <div class="card">

            <div class="card-header">
                <a href="{{ url()->previous() }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
                </a>
                <h2><i class="fa fa-align-justify"></i> <strong>Create</strong> Incident
                    <small>
                        To add a new Incident record, complete the form details below and press submit to save your data.
                    </small>
                </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

                @if ($errors->any())
                <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
                @endif

                {!! Form::open([
                'url' => 'incidents', 
                'class' => 'form-horizontal', 
                'files' => true
                ]) !!}

                    @include ('incidents.form', ['submitButtonText' => 'Create Incident'])

                {!! Form::close() !!}

            </div><!-- /.card-body -->

            <div class="card-footer">{{ ucfirst('Incident') }} Form
            </div>

        </div><!-- /.card -->
    </div><!-- /.animate.fadeIn -->
</div><!-- /.container-fluid -->
@endsection