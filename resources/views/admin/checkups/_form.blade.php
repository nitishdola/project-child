<div class="form-group {{ $errors->has('checkup_date') ? 'has-error' : ''}}">
  {!! Form::label('checkup_date*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-3">
    {!! Form::text('checkup_date', date('Y-m-d'), ['class' => 'zebra_datepicker form-control required', 'id' => 'code', 'placeholder' => 'Checkup Date', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('checkup_date', '<span class="help-inline">:message</span>') !!}
</div>
<hr>
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
  {!! Form::label('student_id', 'Select Student*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    <div class="selectRow">
        <input type="hidden" id="student_id" name='student_id' />
    </div>
  </div>
  {!! $errors->first('student_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('class*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('class', null, ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Class', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('class', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
  {!! Form::label('section*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('section', null, ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Section', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('section', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('stream') ? 'has-error' : ''}}">
  {!! Form::label('stream', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::text('stream', null, ['class' => 'form-control required', 'id' => 'stream', 'placeholder' => 'Select Stream', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('stream', '<span class="help-inline">:message</span>') !!}
</div>