

<a href="{{ route('app.registers.samples.show', $samples->id) }}" title="View" class="btn btn-primary btn-sm">
<i class="fa fa-fw fa-search-plus"></i>
</a>
<a href="{{ route('app.registers.samples.edit', $samples->id) }}" title="Edit" class="btn btn-success btn-sm">
<i class="fa fa-fw fa-edit"></i>
</a>

{{--  <button 
  data-remote="/app/registers/samples/{{ $samples->id }}" 
  data-href="{{ route('app.registers.samples.destroy', $samples->id) }}" 
  data-id="{{ $samples->id }}" 
  data-toggle="modal" 
  data-target="#confirm-delete"
  class="btn btn-danger btn-sm btn-delete">
  <i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>
</button>  --}}


{{ Form::open([ 'method'=>'DELETE', 'url' => ['/app/registers/samples', $samples->id], 'style' => 'display:inline']) }}
{!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', 
array(
  'type'        =>  'submit',
  'class'       =>  'btn btn-danger btn-sm btn-delete',
  'title'       =>  'Delete Sample',
  // 'data-id'     =>  $samples->id, 
  'data-remote' =>  route('app.registers.samples.destroy', $samples->id),
  // 'data-href'   =>  route('app.registers.samples.destroy', $samples->id), 
  // 'data-href' =>  url('/app/registers/samples', $samples->id)
  // 'data-toggle' => 'modal',
  // 'data-target' => '#confirm-delete',
  // 'onclick'     =>  'ConfirmDelete()'
)) !!}
{!! Form::close() !!}