
<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
  {!! Form::label('height(in cm)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('height', null, ['class' => 'form-control required', 'id' => 'class', 'placeholder' => 'Height in CM', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('height', '<span class="help-inline">:message</span>') !!}
</div>

<hr>

<div class="form-group {{ $errors->has('weight') ? 'has-error' : ''}}">
  {!! Form::label('weight(in Kg)*', '', array('class' => 'col-md-3 control-label')) !!}
  <div class="col-md-2">
    {!! Form::text('weight', null, ['class' => 'form-control required', 'id' => 'section', 'placeholder' => 'Weight (in Kg)', 'autocomplete' => 'off', 'required' => 'true']) !!}
  </div>
  {!! $errors->first('weight', '<span class="help-inline">:message</span>') !!}
</div>


<div id="disease_box">
  <div class="disease-list">
    <div class="form-group {{ $errors->has('disease_id') ? 'has-error' : ''}}">
      {!! Form::label('disease_id', 'Select Disease', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-5">
        {!! Form::select('disease_id[]', $diseases, null, ['class' => 'form-control disease-lists', 'id' => 'disease_id', 'placeholder' => 'Select Disease']) !!}
      </div>
      {!! $errors->first('disease_id', '<span class="help-inline">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">

      <label class="col-md-3 control-label"> Select Sub Disease <div class="lblmsg">**Hold &lt;Ctrl&gt; key to select multiple sub disease(s)</div> </label>
      <div class="col-md-5">
        <select class="sub-disease-lists form-control" multiple="" name="sub_diseases[]">
        </select>
      </div>
    </div>
  </div>
</div>
<div style="margin: 16px 0;">
  <div class="col-md-4"></div>
  <div class="col-md-8"><a href="#" id="addMore" class="btn btn-info">Add More Disease</a></div>
</div>

<div id="finding_box">
  <div class="finding-list">
    <div class="form-group {{ $errors->has('finding') ? 'has-error' : ''}}">
      {!! Form::label('finding', '', array('class' => 'col-md-3 control-label')) !!}
      <div class="col-md-5">
        {!! Form::textarea('finding[]', null, ['class' => 'form-control required finding', 'id' => 'finding', 'placeholder' => 'Write finding', 'rows' => 3, 'autocomplete' => 'off']) !!}
      </div>
      {!! $errors->first('finding', '<span class="help-inline">:message</span>') !!}
    </div>
  </div>
</div>

<div style="margin: 16px 0;">
  <div class="col-md-4"></div>
  <div class="col-md-8"><a href="#" id="addMoreFinding" class="btn btn-info">Add More Finding</a></div>
 </div>


@section('page_css')
<style>
.lblmsg { font-weight: 600; font-size: 0.88em; }
</style>
@stop
