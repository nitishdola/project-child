@foreach($other_vaccine as $other)
<div class="col-md-3">
	<div class="form-group">
		<label class="col-sm-7 control-label">{{ $other->name }}</label>
		<div class="col-sm-5">
			<input type="hidden" name="other_vaccines[]" type="hidden" value="{{ $other->id }}" />
			<label class="checkbox-inline"><input type="checkbox" name="other_vaccines_{{$other->id}}" value="{{$other->id}}" class="ichecks"></label>
		</div>
	</div>
</div>
@endforeach