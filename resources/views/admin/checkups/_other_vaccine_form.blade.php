@foreach($other_vaccine as $other)
<div class="col-md-3">
	<div class="form-group">
		<label class="col-sm-7 control-label">{{ $other->name }}</label>
		<div class="col-sm-5">
			<label class="checkbox-inline"><input type="checkbox" name="other_vaccines[]" value="{{$other->id}}" class="ichecks"></label>
		</div>
	</div>
</div>
@endforeach