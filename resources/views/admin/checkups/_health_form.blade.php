
<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('height*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-7">
    {!! Form::text('height', 'Not Done', ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Height in CM', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  <div class="col-md-2"><b>(in cm)</b></div> 
  {!! $errors->first('height', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
  {!! Form::label('weight', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-7">
    {!! Form::text('weight', 'Not Done', ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Weight (in kg)', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  <div class="col-md-2"><b>(in Kg)</b></div> 
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>

