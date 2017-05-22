<br><br>
<div class="col-md-4 ent-disease">
	<div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
	  {!! Form::label('sub_disease_id', 'Disease', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    <select id="entSubDiseaseList" class="form-control"></select>
	  </div>
	  {!! $errors->first('sub_disease_id', '<span class="help-inline">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('ent_comments') ? 'has-error' : ''}}">
	  {!! Form::label('ent_comments', 'Comments', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    {!! Form::textarea('ent_comments[]', null, ['class' => 'form-control required', 'id' => 'ent_comments', 'placeholder' => 'Comments', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
	  </div>
	  {!! $errors->first('ent_comments', '<span class="help-inline">:message</span>') !!}
	</div>

</div>

<div class="col-md-12">
	<a href="javascript:void(0)" class="addMoreEnt btn btn-warning btn-xs">Add More</a>
</div>





