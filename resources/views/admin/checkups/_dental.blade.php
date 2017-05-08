<br><br>
<div class="col-md-4 dental-disease">
	<div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
	  {!! Form::label('sub_disease_id', 'Disease', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    <select id="dentalSubDiseaseList" class="form-control"></select>
	  </div>
	  {!! $errors->first('sub_disease_id', '<span class="help-inline">:message</span>') !!}
	</div>
</div>

<div class="col-md-12">
	<a href="javascript:void(0)" class="addMoreDental btn btn-warning btn-xs">Add More</a>
</div>


<div class="col-md-6">
	<div class="form-group {{ $errors->has('dental_comments') ? 'has-error' : ''}}">
	  {!! Form::label('dental_comments', 'Comments', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    {!! Form::textarea('dental_comments', null, ['class' => 'form-control required', 'id' => 'dental_comments', 'placeholder' => 'Comments', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
	  </div>
	  {!! $errors->first('dental_comments', '<span class="help-inline">:message</span>') !!}
	</div>
</div>


