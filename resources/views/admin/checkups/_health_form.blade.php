
<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('height(in cm)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('height', 'Not Done', ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Height in CM', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('height', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
  {!! Form::label('weight(in Kg)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('weight', 'Not Done', ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Weight (in Kg)', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>

