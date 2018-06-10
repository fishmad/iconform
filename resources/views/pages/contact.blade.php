

@extends('layouts.master')
@section('content')

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Contact</div>
            <div class="card-body">Contact us page

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
