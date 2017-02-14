@extends('layouts.admin')

@section('page_title') Add Checkup @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Checkup</h3>
            </div>
            {!! Form::open(array('route' => 'school.store', 'id' => 'school.store', 'class' => 'form-horizontal row-border')) !!}
            <div class="content">
			    @include('admin.checkups._form')
			</div>
			<hr>
			<div class="content">
			    @include('admin.checkups._health_form')
			</div>

			<a href="#" id="addMore" class="btn btn-info">Add More</a> 
			{!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
		        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
		    {!!form::close()!!}
		</div>
	</div>
</div>
@endsection

@section('page_scripts')
<script>
$('#addMore').click(function(e) {
	e.preventDefault();
	//var item = 1;
	//$(".select2other").select2();
	//$('.add_more_item').click(function(e) {
	$latest_div 	= $('#disease_box .disease-list');
	//$('select.select2other').select2('destroy');
	$clone 			= $latest_div.clone(true, true);
	$latest_div.after($clone);// console.log($clone.html());
	//$('select.select2other').select2({ minimumInputLength: 3 });
	//$clone.find(':text').val('');
	//$clone.find('.quantity_demanded').val('');
	//$clone.find('.stock_in_hand').text('');
	//$clone.find('.item_code').text('');
	//$clone.find('.unit').text('');
	//$clone.find('rate').val('');
	//item++;
	//show_hide_item(item);
});
</script>
@stop