@extends('_layouts.master')

@section('content')

      <div class="container">
        <div class="animate fadeIn">
          <div class="card">

            <div class="card-header">
              <a href="{{ route('app.registers.samples.index') }}" data-toggle="tooltip" title="Any changes you made will not be saved..." class="btn btn-outline-primary float-right">
                <i class="fa fa-arrow-left"></i> Back
              </a>
              <h2><i class="fa fa-align-justify"></i> <strong>Show</strong> Sample 
                <small>
                  {{ $sample->title }}
                </small>
              </h2>
            </div><!-- ./card-header-->

            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-borderless">
                  <tbody>
                      <tr>
                        <th>ID</th>
                        <td>{{ $sample->id }}</td>
                      </tr>
                      <tr>
                        <th>Title</th>
                        <td>{{ $sample->name }}</td>
                      </tr><tr>
                        <th>Email</th>
                        <td>{{ $sample->image }}</td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td>{{ $sample->date }}</td>
                      </tr>
                  </tbody>
                </table>
              </div><!-- /.table-responsive -->

            </div><!-- ./card-body-->

            <div class="card-footer">
              Sample info
            </div>

          </div><!-- ./card-->
        </div><!-- ./animate fadeIn-->
      </div><!-- ./container-fluid-->

@endsection
