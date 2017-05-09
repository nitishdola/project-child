<div class="form-group {{ $errors->has('school_id') ? 'has-error' : ''}}">
  {!! Form::label('school_id', 'School*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('school_id', $schools, null, ['class' => 'select2', 'id' => 'school_id', 'placeholder' => 'Select School', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('school_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('registration_number') ? 'has-error' : ''}}">
  {!! Form::label('registration_number*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('registration_number', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Registration Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('registration_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('school_registration_number') ? 'has-error' : ''}}">
  {!! Form::label('school_registration_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('school_registration_number', null, ['class' => 'form-control required', 'id' => 'school_registration_number', 'placeholder' => 'School Registration Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('school_registration_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
  {!! Form::label('father_name', 'Father\'s Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('father_name', 'Not Mentioned', ['class' => 'form-control required', 'id' => 'father_name', 'placeholder' => 'Father\'s Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('father_name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
  {!! Form::label('mother_name', 'Mother\'s Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('mother_name', 'Not Mentioned', ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Mother\'s Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('mother_name', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('guardian_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('guardian_name', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Guardian Name', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('guardian_name', '<span class="help-inline">:message</span>') !!}
</div>


<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : ''}}">
  {!! Form::label('contact_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('contact_number', null, ['class' => 'form-control required', 'id' => 'contact_number', 'placeholder' => 'Contact Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('contact_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('family_doctor') ? 'has-error' : ''}}">
  {!! Form::label('family_doctor', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('family_doctor', null, ['class' => 'form-control required', 'id' => 'family_doctor', 'placeholder' => 'Family Doctor', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('family_doctor', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('doctor_number') ? 'has-error' : ''}}">
  {!! Form::label('doctor_number', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('doctor_number', null, ['class' => 'form-control required', 'id' => 'doctor_number', 'placeholder' => 'Family Doctor Phone Number', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('doctor_number', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('history') ? 'has-error' : ''}}">
  {!! Form::label('history', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('history', null, ['class' => 'form-control required', 'id' => 'history', 'placeholder' => 'History (if any )', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('history', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
  {!! Form::label('dob', 'Date of Birth', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('dob', null, ['class' => 'zebra_datepicker_yearwise form-control required', 'id' => 'code', 'placeholder' => 'Date of Birth', 'autocomplete' => 'off']) !!}
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

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
  {!! Form::label('address', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::textarea('address', null, ['class' => 'form-control required', 'id' => 'address', 'placeholder' => 'Enter Student Address', 'rows' => 4, 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('address', '<span class="help-inline">:message</span>') !!}
</div>