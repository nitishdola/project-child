@extends('layouts.admin')

@section('page_title') Add Checkup @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Checkup</h3>
            </div>
            {!! Form::model($checkup, array('route' => ['checkup.post', $checkup->id], 'id' => 'checkup.post', 'class' => 'form-horizontal row-border')) !!}
                <div class="content">
    			    @include('admin.checkups._form')
    			</div>
    			<hr>
    			<div class="content">
    			    @include('admin.checkups._health_form')

    			    @foreach($checkup_diseases as $cd)
    			    <div class="form-group {{ $errors->has('disease_id') ? 'has-error' : ''}}">
						{!! Form::label('disease_id', 'Select Disease', array('class' => 'col-md-3 control-label')) !!}
						<div class="col-md-5">
							{!! Form::select('disease_id[]', $diseases, $cd->disease_id, ['class' => 'form-control disease-lists', 'id' => 'disease_id', 'placeholder' => 'Select Disease']) !!}
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
    			    @endforeach
    			</div>
                <hr>
                <div class="content" style="background: #F9F3D9; padding-bottom: 10px;">
                    <h4>Vaccination Status</h4>
                    @include('admin.checkups._vaccine_form')
                </div>

                <hr>
                <div class="content">
                <h4>Boosters</h4>
                @include('admin.checkups._booster_form')
                </div>


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
	$latest_div 	= $('#disease_box .disease-list:last');

	$clone 			= $latest_div.clone(true, true);
	$clone.find("input[type='text'], select.sub-disease-lists").empty();

	$latest_div.after($clone);// console.log($clone.html());
});


$('#addMoreFinding').click(function(e) {
    e.preventDefault();
    //var item = 1;
    $latest_fdiv     = $('#finding_box .finding-list:last');

    $fclone          = $latest_fdiv.clone(true, true);
    $fclone.find("textarea").val("").end();
    $latest_fdiv.after($fclone);// console.log($clone.html());

});

$(".disease-lists").on("change", function() {
	var url 	= '';
	var data	= '';
	var $this = $(this);
	var disease_id = $this.val();
	if(disease_id != '' || disease_id != 0) {
		$.blockUI();
		url 	+= '{{ route("api.sub_disease_list") }}';
		data 	+= '&disease_id='+disease_id;
		$.ajax({
			data : data,
			url  : url,
			type : 'get',
			dataType : 'json',

			error : function(resp) {
				console.log(resp);
				$.unblockUI();
			},

			success : function(resp) {
				$.unblockUI();
				$last_div 	= $this.closest('.disease-list');

				render_ui(resp, $last_div);
			}
		});
	}
});

function render_ui(resp,$last_div) {
	html = '';
	$.each(resp, function (key, val) {
		html += '<option value="'+val.id+'">'+val.name+'</option>';
    });
    console.log(html);
    $last_div.find('.sub-disease-lists').html(html);
}
</script>
@stop
