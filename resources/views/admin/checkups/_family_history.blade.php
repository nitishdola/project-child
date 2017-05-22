@foreach($family_history as $history)
<div class="col-md-3">
	<div class="form-group">
		<label class="col-sm-7 control-label">{{ $history->name }}</label>
		<div class="col-sm-5">
			<label class="checkbox-inline"><input type="checkbox" name="family_histories[]" value="{{$history->id}}" class="ichecks"></label>
		</div>
	</div>
</div>
@endforeach