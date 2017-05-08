<div class="form-group {{ $errors->has('allergy_id') ? 'has-error' : ''}}">
  {!! Form::label('allergy_id', 'Select Allergy', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('allergy_id[]', $allergies, null, ['class' => 'form-control allergy', 'id' => 'allergy_id', 'placeholder' => 'Select Allergy']) !!}
  </div>
  {!! $errors->first('allergy_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('sub_allergy_id') ? 'has-error' : ''}} " id="sub_allergy_id" style="display: none">
  {!! Form::label('sub_allergy_id', 'Select Sub Allergy', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5 sub_Allergy">
    	
  </div>
  {!! $errors->first('sub_allergy_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('other_sub') ? 'has-error' : ''}} " id="other_sub" style="display: none">
  {!! Form::label('other_sub', 'Please specify', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-9">
    	{!! Form::text('other_sub', null, ['class' => 'form-control', 'id' => 'other_sub', 'placeholder' => 'Please specify in details']) !!}
  </div>
  {!! $errors->first('other_sub', '<span class="help-inline">:message</span>') !!}
</div>
