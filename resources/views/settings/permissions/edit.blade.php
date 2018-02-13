@extends('_layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Edit Permission: {{ $permission->name }}
              <div class="card-actions">
                <a href="#" class="btn-minimize"><i class="icon-arrow-down"></i></a>
                <a href="#" class="btn-close"><i class="icon-close"></i></a>
              </div>
            </div>
            <div class="card-body">
              @if ($errors->any())
              <ul class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              @endif
              {!! Form::model($permission, [
                'method' => 'PATCH',
                'url' => ['/settings/permissions', $permission->id],
                'class' => 'form-horizontal',
                'files' => true
              ]) !!}
              @include ('settings.permissions.form', ['submitButtonText' => 'Update'])
              {!! Form::close() !!}
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div><!-- /.animate.fadeIn -->
      </div><!-- /.container-fluid -->
@endsection