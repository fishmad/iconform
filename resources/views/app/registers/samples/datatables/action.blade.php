<a href="{{ route('app.registers.samples.show', $samples->id) }}" title="View" class="btn btn-primary btn-sm">
<i class="fa fa-fw fa-search-plus"></i>
</a>
<a href="{{ route('app.registers.samples.edit', $samples->id) }}" title="Edit" class="btn btn-success btn-sm">
<i class="fa fa-fw fa-edit"></i>
</a>
{{--  <button class="btn btn-danger btn-sm btn-delete" data-remote="/registers/samples/{{ $samples->id }}"><i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>  --}}
<button class="btn btn-danger btn-sm btn-delete" data-remote="{{ route('app.registers.samples.destroy', $samples->id) }}">
<i class="fa fa-fw fa-trash-o" aria-hidden="true"></i>