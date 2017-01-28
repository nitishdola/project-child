<div class="form-group {{ $errors->has('school_id') ? 'has-error' : ''}}">
  {!! Form::label('school_id', 'School*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('school_id', $schools, null, ['class' => 'select2', 'id' => 'school_id', 'placeholder' => 'Select School', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('school_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
  {!! Form::label('registration_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('registration_number', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Registration Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('registration_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('father_name', 'Father\'s Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('code', null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Father\'s Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('code', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('mother_name', 'Mother\'s Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('mother_name', null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Mother\'s Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('mother_name', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('guardian_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('guardian_name', null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Guardian Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('guardian_name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
  {!! Form::label('dob', 'Date of Birth', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('dob', null, ['class' => 'zebra_datepicker form-control required', 'id' => 'code', 'placeholder' => 'Date of Birth', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('dob', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}"">
   <label class="col-sm-3 control-label">Gender</label>
   <div class="col-sm-6"><label class="radio-inline"><input type="radio" checked="" name="sex" class="icheck" value="male"> Male</label><label class="radio-inline"><input type="radio" name="sex" value="female" class="icheck"> Female</label></div>
</div>

<div class="form-group {{ $errors->has('blood_group_id') ? 'has-error' : ''}}">
  {!! Form::label('blood_group_id', 'Blood Group', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('blood_group_id', $blood_groups, null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Select Blood Group', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('blood_group_id', '<span class="help-inline">:message</span>') !!}
</div>