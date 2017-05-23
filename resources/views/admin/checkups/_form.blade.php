
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
  {!! Form::label('student_id', 'Select Student*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    <div class="selectRow">
        <input type="hidden" id="student_id" class="col-md-12" name='student_id' />
    </div>
  </div>
  {!! $errors->first('student_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('school_id') ? 'has-error' : ''}}">
  {!! Form::label('school_id', 'Select School*', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
      {!! Form::select('school_id', $schools, null, ['class' => 'form-control required', 'id' => 'school_id', 'placeholder' => 'Select School', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('student_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('class*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('class', null, ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Class', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('class', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
  {!! Form::label('section', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('section', null, ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Section', 'autocomplete' => 'off',  'required' => 'true']) !!}
  </div>
  {!! $errors->first('section', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('stream') ? 'has-error' : ''}}">
  {!! Form::label('stream', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('stream', null, ['class' => 'form-control required', 'id' => 'stream', 'placeholder' => 'Select Stream', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('stream', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('semester') ? 'has-error' : ''}}">
  {!! Form::label('semester', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    {!! Form::text('semester', null, ['class' => 'form-control required', 'id' => 'semester', 'placeholder' => 'Select Semester', 'autocomplete' => 'off']) !!}
  </div>
  {!! $errors->first('semester', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
  {!! Form::label('department', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    <select id="department" name="department_id" class="form-control"></select>
  </div>
  {!! $errors->first('department', '<span class="help-inline">:message</span>') !!}
</div>

<a href="javascript:void(0)" class="addNewDepartment">Add New Department</a>

<div id="addDepartmentBox" style="display: none;">
  <div class="form-group" >
    {!! Form::label('department_name', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      {!! Form::text('', null, ['class' => 'form-control required', 'id' => 'department_name', 'placeholder' => 'Department Name', 'autocomplete' => 'off']) !!}
    </div>
    {!! $errors->first('department_name', '<span class="help-inline">:message</span>') !!}
  </div>

  <div class="form-group">
    {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-9">
      <button type="button" class="btn btn-default btn-sm" id="btnAddDepartment">Add</button>
    </div>
  </div>  
</div>
