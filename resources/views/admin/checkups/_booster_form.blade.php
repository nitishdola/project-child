@foreach($vaccines as $vaccine)
<div class="col-md-3">
	<div class="form-group">
		<label class="col-sm-5 control-label">{{ $vaccine->name }}</label>
		<div class="col-sm-5">
			<label class="checkbox-inline"><input type="checkbox" name="boosters[]" value="{{$vaccine->id}}" class="icheck"></label>
		</div>
	</div>
</div>
@endforeach