
<a href="{{ route('app.settings.roles.edit', $roles->id) }}" title="Edit" class="btn btn-success btn-sm">
  <i class="fa fa-fw fa-edit"></i>
</a>

<a href="{{ route('app.settings.roles.show', $roles->id) }}" title="View" class="btn btn-primary btn-sm">
  <i class="fa fa-fw fa-search-plus"></i>
</a>

{{ Form::open([ 'method'=>'DELETE', 'url' => ['/app/settings/roles', $roles->id], 'style' => 'display:inline']) }}
{{  Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', 
array(
  'type'        =>  'button',
  'class'       =>  'btn btn-sm btn-danger',
  'title'       =>  'Delete',
  'data-toggle' =>  'modal',
  'data-target' =>  '#confirmDelete',
  'data-title'  =>  $roles->id . '. Are you sure?',
  'data-message'=>  'Delete: ' . $roles->name,
)) }}
{{ Form::close() }}