
<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('height(in cm)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('height', null, ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Height in CM', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('height', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
  {!! Form::label('weight(in grams)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('weight', null, ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Weight (in grams)', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>
    
<div id="disease_box">
  <div class="disease-list">
    <div class="form-group {{ $errors->has('disease_id') ? 'has-error' : ''}}">
      {!! Form::label('disease_id', 'Select Disease', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-5">
        {!! Form::select('disease_id_1', $diseases, null, ['class' => 'form-control', 'id' => 'disease_id', 'placeholder' => 'Select Disease']) !!}
      </div>
      {!! $errors->first('disease_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
      {!! Form::label('sub_disease_id_1', 'Select Sub Disease', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-5">
        {!! Form::select('sub_disease_id', $diseases, null, ['multiple' => '','class' => 'select2other', 'id' => 'disease_id', 'placeholder' => 'Select Disease']) !!}
      </div>
      {!! $errors->first('sub_disease_id', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>