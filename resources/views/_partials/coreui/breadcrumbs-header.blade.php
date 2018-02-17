{{--  @php
$breadcrumbs = Breadcrumbs::generate()
@endphp  --}}
{{--  nav-link  --}}
      <!-- Breadcrumbs -->
      <ul class="nav navbar-nav d-md-down-none  px-3">
        {{ Breadcrumbs::render() }}
      </ul><!-- /Breadcrumbs -->