
<div class="form-group row {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
        <div class="col-md-9 col-lg-8">
        {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
        <div class="col-md-9 col-lg-8">
        {!! Form::textarea('description', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('incident_type') ? 'has-error' : ''}}">
    {!! Form::label('incident_type', 'Incident Type', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
        <div class="col-md-9 col-lg-8">
        {!! Form::text('incident_type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('incident_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row {{ $errors->has('ip') ? 'has-error' : ''}}">
    {!! Form::label('ip', 'Ip', ['class' => 'col-md-3 col-lg-2 col-form-label']) !!}
        <div class="col-md-9 col-lg-8">
        {!! Form::textarea('ip', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('ip', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="row">
  <div class="offset-md-2 col-md-4">
    {{ Form::button('<i class="fa fa-dot-circle-o"></i> ' . (isset($submitButtonText) ? $submitButtonText : "Submit"), ['class' => 'btn btn-primary', 'type' => 'submit'] ) }}
    <a href="{{ url()->previous() }}" class="btn btn-danger" title="Back"><i class="fa fa-ban"></i> Cancel</a>
  </div>
</div>