
<a href="{{ route('app.registers.samples.edit', $samples->id) }}" title="Edit" class="btn btn-success btn-sm">
<i class="fa fa-fw fa-edit"></i>
</a>
<a href="{{ route('app.registers.samples.show', $samples->id) }}" title="View" class="btn btn-primary btn-sm">
<i class="fa fa-fw fa-search-plus"></i>
</a>

{{ Form::open([ 'method'=>'DELETE', 'url' => ['/app/registers/samples', $samples->id], 'style' => 'display:inline']) }}
{{  Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', 
array(
  'type'        =>  'button',
  'class'       =>  'btn btn-sm btn-danger',
  'title'       =>  'Delete',
  'data-toggle' =>  'modal',
  'data-target' =>  '#confirmDelete',
  'data-title'  =>  $samples->id . '. Are you sure?',
  'data-message'=>  'Delete: ' . $samples->email,
)) }}
{{ Form::close() }}