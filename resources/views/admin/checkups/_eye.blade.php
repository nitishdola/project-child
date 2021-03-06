
<div class="clearfix"></div>
<div class="col-md-4 eye-disease">
	<div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
	  {!! Form::label('sub_disease_id', 'Disease', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    <select id="eyeSubDiseaseList" class="form-control"></select>
	  </div>
	  {!! $errors->first('sub_disease_id', '<span class="help-inline">:message</span>') !!}
	</div>

	<div class="form-group {{ $errors->has('eye_comments') ? 'has-error' : ''}}">
	  {!! Form::label('eye_comments', 'Comments', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    {!! Form::textarea('eye_comments[]', null, ['class' => 'form-control required eye_comments', 'id' => 'eye_comments', 'placeholder' => 'Comments', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
	  </div>
	  {!! $errors->first('eye_comments', '<span class="help-inline">:message</span>') !!}
	</div>
	<input type="hidden" name="eye_disease_id" value="11">
</div>

<div class="col-md-12">
	<a href="javascript:void(0)" class="addMoreEye btn btn-warning btn-xs">Add More</a>
</div>
<br><br>
<hr>
<div class="col-md-12" style="margin-top: 30px;">
	<table class="table">
		<thead>
			<tr>
				<th>VISION</th>
				<th>Naked Eye</th>
				<th>With Spects</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Right</td>
				<td>
					<div class="form-group {{ $errors->has('right_naked_eyesight_id') ? 'has-error' : ''}}">
					 
						<div class="col-md-7">
						    {!! Form::select('right_naked_eyesight_id', $eyesights, 1, ['class' => 'form-control required', 'id' => 'right_naked_eyesight_id', 'placeholder' => 'Select Eyesight', 'autocomplete' => 'off', 'required' => 'true']) !!}
						</div>

						<div class="col-md-5"> 
							<input type="checkbox" class="ichecks" value="1" name="right_naked_is_partial"> Partial 
						</div>
						{!! $errors->first('right_naked_eyesight_id', '<span class="help-inline">:message</span>') !!}
					</div>
				</td>
				<td>
					<div class="form-group {{ $errors->has('right_spects_eyesight_id') ? 'has-error' : ''}}">
					 
					  <div class="col-md-7">
					    {!! Form::select('right_spects_eyesight_id', $eyesights, null, ['class' => 'form-control required', 'id' => 'left_naked_eyesight_id', 'placeholder' => 'Select Eyesight', 'autocomplete' => 'off', 'required' => 'true']) !!}
					  </div>

					  <div class="col-md-5"> <input type="checkbox" value="1" class="ichecks" name="right_spects_is_partial"> Partial </div>
					  {!! $errors->first('right_spects_eyesight_id', '<span class="help-inline">:message</span>') !!}
					</div>
				</td>
			</tr>

			<tr>
				<td>Left</td>
				<td>
					<div class="form-group {{ $errors->has('left_naked_eyesight_id') ? 'has-error' : ''}}">
					 
					  <div class="col-md-7">
					    {!! Form::select('left_naked_eyesight_id', $eyesights, 1, ['class' => 'form-control required', 'id' => 'left_naked_eyesight_id', 'placeholder' => 'Select Eyesight', 'autocomplete' => 'off', 'required' => 'true']) !!}
					  </div>
					  <div class="col-md-5"> <input type="checkbox" value="1" class="ichecks" name="left_naked_is_partial"> Partial </div>
					  {!! $errors->first('left_naked_eyesight_id', '<span class="help-inline">:message</span>') !!}
					</div>
				</td>
				<td>
					<div class="form-group {{ $errors->has('left_spects_eyesight_id') ? 'has-error' : ''}}">
					 
					  <div class="col-md-7">
					    {!! Form::select('left_spects_eyesight_id', $eyesights, null, ['class' => 'form-control required', 'id' => 'left_spects_eyesight_id', 'placeholder' => 'Select Eyesight', 'autocomplete' => 'off', 'required' => 'true']) !!}
					  </div>
					  <div class="col-md-5"> <input type="checkbox" value="1" class="ichecks" name="left_spects_is_partial"> Partial </div>
					  {!! $errors->first('left_spects_eyesight_id', '<span class="help-inline">:message</span>') !!}
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<br><br>
<div class="col-md-6">
	<div class="form-group {{ $errors->has('color_vision') ? 'has-error' : ''}}">
	  {!! Form::label('color_vision', '', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    {!! Form::text('color_vision', 'Normal', ['class' => 'form-control required', 'id' => 'color_vision', 'placeholder' => 'Color Vision', 'autocomplete' => 'off']) !!}
	  </div>
	  {!! $errors->first('color_vision', '<span class="help-inline">:message</span>') !!}
	</div>
</div>

<div class="col-md-6">
	<div class="form-group {{ $errors->has('extra_ocular_movement') ? 'has-error' : ''}}">
	  {!! Form::label('extra_ocular_movement', '', array('class' => 'col-md-3 control-label')) !!}
	  <div class="col-md-9">
	    {!! Form::text('extra_ocular_movement', null, ['class' => 'form-control required', 'id' => 'extra_ocular_movement', 'placeholder' => 'Extra Ocular Movement', 'autocomplete' => 'off' ]) !!}
	  </div>
	  {!! $errors->first('extra_ocular_movement', '<span class="help-inline">:message</span>') !!}
	</div>
</div>

