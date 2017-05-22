@foreach($vaccines as $vaccine)
<div class="col-md-4">
	
	<div class="form-group">
		<label class="col-sm-3 control-label">{{ $vaccine->name }}</label>
		<div class="col-sm-9">
			@for($i=1; $i <= $vaccine->number_of_doses; $i++)
				<input type="hidden" name="vaccines[]" type="hidden" value="{{ $vaccine->id }}" />
				<label class="checkbox-inline col-md-2">
					<input type="checkbox" name="vaccines_{{$vaccine->id}}" value="{{$i}}" class="ichecks">
				</label>
			@endfor
		</div>
	</div>
</div>
@endforeach