<div class="form-group {{ $errors->has('short_name') ? 'has-error' : ''}}">
  {!! Form::label('short_name', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('short_name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'Short Name', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('short_name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
  {!! Form::label('name', 'School Name*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('name', null, ['class' => 'form-control required', 'id' => 'name', 'placeholder' => 'School Name', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('name', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
  {!! Form::label('district_id', 'District*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('district_id', $districts, null, ['class' => 'form-control required', 'id' => 'district_id', 'placeholder' => 'Select District', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('district_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('block_id') ? 'has-error' : ''}}">
  {!! Form::label('block_id', 'Block*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('block_id', $blocks, null, ['class' => 'form-control required', 'id' => 'block_id', 'placeholder' => 'Select Block', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('block_id', '<span class="help-inline">:message</span>') !!}
</div>



<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('code', 'Code*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('code', null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Code', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('code', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
  {!! Form::label('enroll', 'Enroll Number*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('code', null, ['class' => 'form-control required', 'id' => 'code', 'placeholder' => 'Enroll Number', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('code', '<span class="help-inline">:message</span>') !!}
</div>
