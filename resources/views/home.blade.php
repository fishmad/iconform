

@extends('_layouts.master')
@section('content')


@foreach (Breadcrumbs::generate('home') as $breadcrumb)
    {{-- ... --}}
@endforeach

      <div class="container-fluid">
        <div class="animate fadeIn">
          <div class="card">
            <div class="card-header">Home</div>
            <div class="card-body">Dashboard

              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

              You are logged in!

            </div><!-- ./card-body-->
          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->
@endsection
