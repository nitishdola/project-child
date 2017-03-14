@foreach($vaccines as $vaccine)
<div class="form-group">
	<label class="col-sm-3 control-label">{{ $vaccine->name }}</label>
	<div class="col-sm-3">
		<label class="checkbox-inline"><input type="checkbox" name="boosters[]" value="{{$vaccine->id}}" class="icheck"></label>
	</div>
</div>
@endforeach