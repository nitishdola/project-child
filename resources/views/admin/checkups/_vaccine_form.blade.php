@foreach($vaccines as $vaccine)
<div class="col-md-3">
	<input type="hidden" name="vaccines[]" type="hidden" value="{{ $vaccine->id }}" />
	<div class="form-group">
		<label class="col-sm-5 control-label">{{ $vaccine->name }}</label>
		<div class="col-sm-6">
			@for($i=1; $i <= $vaccine->number_of_doses; $i++)
			<label class="checkbox-inline"><input type="checkbox" name="{{ $vaccine->id }}[]" value="{{$i}}" class="icheck"></label>
			@endfor
		</div>
	</div>
</div>
@endforeach