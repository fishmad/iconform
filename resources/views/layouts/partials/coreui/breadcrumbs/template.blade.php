
        <!-- Breadcrumbs -->
            <ul class="nav navbar-nav d-md-down-none px-3">
@if(count($breadcrumbs))
@foreach ($breadcrumbs as $breadcrumb)
@if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
@else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
@endif
@endforeach
@else
                <li class="breadcrumb-item active">Default</li>
@endif
            </ul><!-- /Breadcrumbs -->
