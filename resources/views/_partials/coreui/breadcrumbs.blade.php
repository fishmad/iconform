{{--  @php
$breadcrumbs = Breadcrumbs::generate()
@endphp  --}}

<!-- Breadcrumbs -->
    <ol class="breadcrumb non-stock">
@if(count($breadcrumbs))
  @foreach ($breadcrumbs as $breadcrumb)
    @if ($breadcrumb->url && !$loop->last)
      <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
    @else
      <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
    @endif
  @endforeach
@else
<li class="breadcrumb-item active">Home ::</li>
@endif
      <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
          <a class="btn" href="#"><i class="icon-speech"></i></a>
          <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
          <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
        </div>
      </li>
    </ol>
<!-- /.Breadcrumbs -->