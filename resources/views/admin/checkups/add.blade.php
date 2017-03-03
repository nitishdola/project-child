@extends('layouts.admin')

@section('page_title') Add Checkup @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Checkup</h3>
            </div>
            {!! Form::open(array('route' => 'checkup.post', 'id' => 'checkup.post', 'class' => 'form-horizontal row-border')) !!}
            <div class="content">
			    @include('admin.checkups._form')
			</div>
			<hr>
			<div class="content">
			    @include('admin.checkups._health_form')
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

var url = '';
url += "{{ route('api.student_list') }}";
console.log(url);


    var searchTerm = null;
    // Remote data example
    var remoteDataConfig = {
        placeholder: "Search for an option...",
        minimumInputLength: 3,
        ajax: {
            url: url,
            dataType: 'json',
            data: function (term, page) {
                // Nothing sent to server side. Mock example setup.
                searchTerm = term.toUpperCase();
            },
            results: function (data, page) {
                // Normally server side logic would parse your JSON string from your data returned above then return results here that match your search term. In this case just returning 2 mock options.
                console.log(data);
                return {
                    results: getMockData( data )
                };
            }
        },
        formatResult: function (option) {
            return "<div>" + option.desc + "</div>";
        },
        formatSelection: function (option) {
            return option.desc;
        }
    };

    function getMockData( mockData ) {

        var foundOptions = [];

        for (var key in mockData) {
            if (mockData[key].desc.toUpperCase().indexOf(searchTerm) >= 0) {
                foundOptions.push(mockData[key]);
            }
        }

        return foundOptions;
    };

    $("#student_id").select2(remoteDataConfig);
</script>
@stop
