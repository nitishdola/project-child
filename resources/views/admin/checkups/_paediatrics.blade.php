<br><br>
<div class="row paediatrics-disease">
	<div class="col-md-6">
		<div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
		  {!! Form::label('paediatrics_disease_id', 'Organ System', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::select('disease_id[]', $diseases, null, ['class' => 'form-control paediatrics_disease_id required', 'id' => '', 'placeholder' => 'Select Paediatrics Organ', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
		  </div>
		  {!! $errors->first('disease_id', '<span class="help-inline">:message</span>') !!}
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
		  {!! Form::label('sub_disease_id', 'Disease', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    <select class="form-control PaediatricSubDiseaseList" name="sub_disease_id[]"></select>
		  </div>
		  {!! $errors->first('sub_disease_id', '<span class="help-inline">:message</span>') !!}
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group {{ $errors->has('Paediatrics_comments') ? 'has-error' : ''}}">
		  {!! Form::label('Paediatrics_comments', 'Comments', array('class' => 'col-md-3 control-label')) !!}
		  <div class="col-md-9">
		    {!! Form::textarea('paediatrics_comments[]', null, ['class' => 'form-control required', 'id' => 'paediatrics_comments', 'placeholder' => 'Comments', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
		  </div>
		  {!! $errors->first('Paediatrics_comments', '<span class="help-inline">:message</span>') !!}
		</div>
	</div>

</div>

<div class="col-md-12">
	<a href="javascript:void(0)" class="addMorePaediatric btn btn-warning btn-xs">Add More</a>
</div>

<hr>








