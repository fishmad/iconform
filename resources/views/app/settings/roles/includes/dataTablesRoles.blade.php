@foreach($users as $item)
@foreach($item->roles()->pluck('name') as $roles )
{{ $roles }}
@endforeach
@endforeach