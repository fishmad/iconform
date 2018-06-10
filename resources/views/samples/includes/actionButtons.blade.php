
<a href="{{ route('samples.edit', $samples->id) }}" title="Edit" class="btn btn-success btn-sm">
<i class="fa fa-fw fa-edit"></i>
</a>
<a href="{{ route('samples.show', $samples->id) }}" title="View" class="btn btn-primary btn-sm">
<i class="fa fa-fw fa-search-plus"></i>
</a>

{{ Form::open([ 'method'=>'DELETE', 'url' => ['samples', $samples->id], 'style' => 'display:inline']) }}
{{  Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', 
array(
  'type'        =>  'button',
  'class'       =>  'btn btn-sm btn-danger',
  'title'       =>  'Delete',
  'data-toggle' =>  'modal',
  'data-target' =>  '#confirmDelete',
  'data-title'  =>  'Confirm delete',
  'data-message'=>  'Last chance! this action can not be reversed. Are you sure you want to delete sample: ' . $samples->id . ' ' . $samples->name . '?',
)) }}
{{ Form::close() }}