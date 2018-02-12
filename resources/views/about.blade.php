

@extends('_layouts.master')
@section('content')


      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">About</div>
            <div class="card-body">About Page

              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection
