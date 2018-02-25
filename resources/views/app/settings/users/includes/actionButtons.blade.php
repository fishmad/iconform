
<a href="{{ route('app.settings.users.show', $users->id) }}" title="View" class="btn btn-primary btn-sm">
<i class="fa fa-fw fa-search-plus"></i>
</a>
<a href="{{ route('app.settings.users.edit', $users->id) }}" title="Edit" class="btn btn-success btn-sm">
<i class="fa fa-fw fa-edit"></i>
</a>

{{ Form::open([ 'method'=>'DELETE', 'url' => ['/app/settings/users', $users->id], 'style' => 'display:inline']) }}
{{  Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', 
array(
  'type'        =>  'button',
  'class'       =>  'btn btn-sm btn-danger',
  'title'       =>  'Delete',
  'data-toggle' =>  'modal',
  'data-target' =>  '#confirmDelete',
  'data-title'  =>  $users->id . '. Are you sure?',
  'data-message'=>  'Delete: ' . $users->email,
)) }}
{{ Form::close() }}