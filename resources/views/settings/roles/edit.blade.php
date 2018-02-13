@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">

          <div class="row justify-content-md-center">
            <div class="col-md-10">

              <div class="card">
                <div class="card-header">Edit Role: {{ $role->name }}</div>

                <div class="card-body">

                    {{--  <a href="{{ url('/settings/permissions') }}" class="btn btn-secondary" title="Back"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>  --}}

                  @if ($errors->any())
                  <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  @endif

                  {!! Form::model($role, [
                    'method' => 'PATCH',
                    'url' => ['/settings/roles', $role->id],
                    'class' => 'form-horizontal',
                    'files' => true
                  ]) !!}

                  @include ('settings.roles.form', ['submitButtonText' => 'Update'])

                  {!! Form::close() !!}
                </div><!-- ./card-body-->
              </div><!-- ./card-->

            </div><!-- ./col-md-11-->.
            </div><!-- ./row justify-content-md-center -->

        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection