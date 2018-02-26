<div class="form-group row {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Name', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
  <div class="col-md-9 col-lg-8">
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('image') ? 'has-error' : ''}}">
  {!! Form::label('image', 'Image', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
  <div class="col-md-9 col-lg-8">
    {!! Form::text('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('date') ? 'has-error' : ''}}">
  {!! Form::label('date', 'Date', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
  <div class="col-md-9 col-lg-8">
    {!! Form::date('date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
  {!! Form::label('description', 'Description', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
  <div class="col-md-9 col-lg-8">
    {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control form-control-lg', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="row">
  <div class="offset-md-2 col-md-4">
    {{ Form::button('<i class="fa fa-dot-circle-o"></i> ' . (isset($submitButtonText) ? $submitButtonText : "Submit"), ['class' => 'btn btn-primary', 'type' => 'submit'] ) }}
    <a href="{{ url('/app/registers/samples') }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
  </div>
</div>