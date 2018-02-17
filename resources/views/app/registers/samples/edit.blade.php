@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header"><a href="{{ route('app.registers.samples.create') }}" class="btn btn-outline-primary float-right">Create a new Record</a>
              <h2><i class="fa fa-align-justify"></i> <strong>Editing </strong> {{ $sample->title }} 
                <small>
                    {{ $sample->title }}
                </small>
              </h2>
            </div>



            <div class="card-body">

              @if ($errors->any())
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif

              {!! Form::model($sample, [
                  'method' => 'PATCH',
                  'url' => ['/app/registers/samples', $sample->id],
                  'class' => 'form-horizontal',
                  'files' => true
              ]) !!}

              @include ('app.registers.samples.form', ['submitButtonText' => 'Update'])

              {!! Form::close() !!}

            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection
