<div class="form-group {{ $errors->has('allergy_id') ? 'has-error' : ''}}">
  {!! Form::label('allergy_id', 'Select Allergy', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    {!! Form::select('allergy_id', $allergies, null, ['class' => 'form-control allergy', 'id' => 'allergy_id', 'placeholder' => 'Select Allergy']) !!}
  </div>
  {!! $errors->first('allergy_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('sub_allergy_id') ? 'has-error' : ''}} " id="sub_allergy_id" style="display: none">
  {!! Form::label('sub_allergy_id', 'Select Sub Allergy', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5 sub_Allergy">
    	
  </div>
  {!! $errors->first('sub_allergy_id', '<span class="help-inline">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('allergy_remarks') ? 'has-error' : ''}} " id="allergy_remarks" style="display: none">
  {!! Form::label('allergy_remarks', 'Please specify', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-5">
    	{!! Form::text('allergy_remarks', null, ['class' => 'form-control', 'id' => 'allergyRemarks', 'placeholder' => 'Please specify in details']) !!}
  </div>
  {!! $errors->first('allergy_remarks', '<span class="help-inline">:message</span>') !!}
</div>
