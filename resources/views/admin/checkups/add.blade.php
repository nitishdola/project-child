@extends('layouts.admin')

@section('page_title') Add Checkup @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
        {!! Form::open(array('route' => 'checkup.post', 'id' => 'checkup.post', 'class' => 'form-horizontal row-border','files' => true)) !!}
        <div class="block-flat">
                <div class="header">
                   <h3>Checkup</h3>
                </div>
                
                <div class="content">
                    <div class="form-group {{ $errors->has('checkup_date') ? 'has-error' : ''}}">
                      {!! Form::label('checkup_date*', '', array('class' => 'col-md-3 control-label')) !!}
                      <div class="col-md-3">
                        {!! Form::text('checkup_date', date('Y-m-d'), ['class' => 'zebra_datepicker form-control required', 'id' => 'code', 'placeholder' => 'Checkup Date', 'autocomplete' => 'off', 'required' => 'true']) !!}
                      </div>
                      {!! $errors->first('checkup_date', '<span class="help-inline">:message</span>') !!}
                    </div>
                    <hr>
                </div>
                <div class="content">
                    <div class="col-md-6">
                        @include('admin.checkups._form')
                    </div>

                    <div class="col-md-6">
                        @include('admin.checkups._health_form')
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="content" style="padding-bottom: 10px; text-align: left;">
                <h4>Allergy</h4>
                    <div class="col-md-12">
                    @include('admin.checkups._allergies')
                    </div>
                </div>

                <div class="clearfix"></div>
                <hr>
                <div class="content row" style="padding-bottom: 10px;">
                    <h4>Vaccination Status</h4>
                    @include('admin.checkups._vaccine_form')
                </div>

                <hr>
                <div class="content row">
                <h4>Others</h4>
                @include('admin.checkups._other_vaccine_form')
                </div>

                <hr>
                <div class="content row">
                <h4>Family History</h4>
                @include('admin.checkups._family_history')
                </div>


                <hr>
                <div class="content row">
                <h4>EYE Complaint</h4> 
                <div class="col-md-12">
                      <a href="javascript:void(0)" class="addNewEye col-md-2">Add New Eye Disease</a>
                </div>

                <div  id="EyeDiseaseBox" style="display: none">
                  <div class="col-md-3">
                    {!! Form::text('', null, ['class' => 'form-control required', 'id' => 'eye_disease_name', 'placeholder' => 'Eye Disease Name','autocomplete' => 'off' ]) !!}
                  </div>
                  <div class="col-md-3">
                    <button class="btn btn-default" type="button" id="AddEyeDisease">Add</button>
                  </div>
                </div>

                @include('admin.checkups._eye')
                </div>

                <hr>
                <div class="content row">
                    <h4>ENT Complaint</h4> 
                    <div class="col-md-10">
                        <div class="form-group {{ $errors->has('add_ENT_data') ? 'has-error' : ''}}">
                          <a href="javascript:void(0)" class="addNewEnt col-md-2">Add New ENT Disease</a>
                          <div  id="ENTDiseaseBox" style="display: none">
                              <div class="col-md-3">
                                {!! Form::text('', null, ['class' => 'form-control required', 'id' => 'ent_disease_name', 'placeholder' => 'ENT Disease Name','autocomplete' => 'off' ]) !!}
                              </div>
                              <div class="col-md-3">
                                <button class="btn btn-default" type="button" id="AddENTDisease">Add</button>
                              </div>
                            </div>
                        </div>
                    </div>

                     @include('admin.checkups._ent')
                </div>

                <hr>
                <div class="content row">
                    <h4>Dental Complaint</h4> 
                    <div class="col-md-10">
                        <div class="form-group {{ $errors->has('add_Dental_data') ? 'has-error' : ''}}">
                          <a href="javascript:void(0)" class="addNewDental col-md-3">Add New Dental Disease</a>
                          <div  id="DentalDiseaseBox" style="display: none">
                              <div class="col-md-3">
                                {!! Form::text('', null, ['class' => 'form-control required', 'id' => 'dental_disease_name', 'placeholder' => 'Dental Disease Name','autocomplete' => 'off' ]) !!}
                              </div>
                              <div class="col-md-3">
                                <button class="btn btn-default" type="button" id="AddDentalDisease">Add</button>
                              </div>
                            </div>
                        </div>
                    </div>

                    @include('admin.checkups._dental')
                    </div>
                </div>

                <hr>
                <div class="content row block-flat">
                    <h4>PAEDIATRICS/SURGICAL</h4> 
                    <div class="col-md-12">
                          <a href="javascript:void(0)" class="addNewPaediatrics col-md-2">Add New Paediatrics Disease</a>
                    </div>
                    <div class="col-md-12">
                            <div  id="PaediatricsDiseaseBox" style="display: none">
                                <div class="col-md-4">
                                    <div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
                                      <div class="col-md-9">
                                        {!! Form::select('disease_id', $diseases, null, ['class' => 'form-control required', 'id' => 'paediatrics_disease_id_insert', 'placeholder' => 'Select Paediatrics Organ', 'rows' => 3, 'autocomplete' => 'off' ]) !!}
                                      </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
                                        {!! Form::text('', null, ['class' => 'form-control required', 'id' => 'paediatrics_disease_name', 'placeholder' => 'Paediatrics Disease Name','autocomplete' => 'off' ]) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{ $errors->has('sub_disease_id') ? 'has-error' : ''}}">
                                    <button class="btn btn-default" type="button" id="AddPaediatricsDisease">Add</button>
                                    </div>
                                </div>
                            </div>
                    </div>

                    @include('admin.checkups._paediatrics')
                    </div>

                    <div class="content row block-flat">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">General Hygiene</label>
                                <div class="col-sm-3">
                                    <label class="checkbox-inline"><input type="checkbox" name="hygiene" value="good" class="ichecks"> Good</label>
                                </div>

                                <div class="col-sm-3">
                                    <label class="checkbox-inline"><input type="checkbox" name="hygiene" value="fair" class="ichecks"> Fair</label>
                                </div>

                                <div class="col-sm-3">
                                    <label class="checkbox-inline"><input type="checkbox" name="hygiene" value="poor" class="ichecks"> Poor</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('Overall Health Rermark') ? 'has-error' : ''}}">
                                  {!! Form::label('overall_comment', 'Overall Health Rermark', array('class' => 'col-md-3 control-label')) !!}
                                  <div class="col-md-9">
                                    {!! Form::textarea('description', null, ['class' => 'form-control required', 'id' => 'overall_comment', 'placeholder' => 'Overall Health Rermark', 'rows' => 5, 'autocomplete' => 'off' ]) !!}
                                  </div>
                                  {!! $errors->first('Overall Health Rermark', '<span class="help-inline">:message</span>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}} " id="file">
                                    {!! Form::label('file', 'Add Photo', array('class' => 'col-md-3 control-label')) !!}
                                    <div class="col-md-5">
                                        {!! Form::file('file', null, ['class' => 'form-control', 'id' => 'file']) !!}
                                    </div>
                                    {!! $errors->first('file', '<span class="help-inline">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
    
        </div>

        <div class="content row ">
            {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
            {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
        </div>

        {!!form::close()!!}
    </div>
</div>
@endsection

@section('page_scripts')
<script>

loadEntList();
loadDentalList();
loadEyeList();
loadDepartments();
//loadPaediatricsList();

$('#addMore').click(function(e) {
    e.preventDefault();
    //var item = 1;
    $latest_div     = $('#disease_box .disease-list:last');

    $clone          = $latest_div.clone(true, true);
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
    var url     = '';
    var data    = '';
    var $this = $(this);
    var disease_id = $this.val();
    if(disease_id != '' || disease_id != 0) {
        $.blockUI();
        url     += '{{ route("api.sub_disease_list") }}';
        data    += '&disease_id='+disease_id;
        $.ajax({
            data : data,
            url  : url,
            type : 'get',
            dataType : 'json',

            error : function(resp) {
                //console.log(resp);
                $.unblockUI();
            },

            success : function(resp) {
                $.unblockUI();
                $last_div   = $this.closest('.disease-list');
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
                //console.log(data);
                return {
                    results: getMockData( data )
                };
            }
        },
        formatResult: function (option) {
            return "<div>" + option.full_name + "</div>";
        },
        formatSelection: function (option) {
            return option.full_name;
        }
    };

    function getMockData( mockData ) {

        var foundOptions = [];

        for (var key in mockData) {
            if (mockData[key].full_name.toUpperCase().indexOf(searchTerm) >= 0) {
                foundOptions.push(mockData[key]);
            }
        }

        return foundOptions;
    }

    $("#student_id").select2(remoteDataConfig);


    $('.allergy').change(function() { 
        $allergy_id = $(this).val(); 
        html = data = url = '';
        if($allergy_id != '') {
            $('#allergy_remarks').val('');
            $('#allergy_remarks').slideUp();
             
            data += '&allergy_id='+$allergy_id;
            url  += "{{ route('api.get_sub_allergies') }}";
            $.ajax({
                data : data,
                url  : url,
                type : 'get',
                dataType : 'json',

                error: function(resp) {

                },

                success : function(resp) {
                    renderSubAllergyUi(resp,$allergy_id);
                }
            });
        }
    });

    function renderSubAllergyUi(resp,allergy_id) {
        html += '';
        $('#sub_allergy_id').show();
        $.each(resp, function(i,v) {
            html += '<label class="radio-inline"><input type="radio" onclick="showOtherSubAllergyBox('+v.id+','+allergy_id+'  )" value="'+v.id+'" name="sub_alg" class="icheck"> '+v.name+'</label>';
        });
        $('.sub_Allergy').html(html);
    }


    function showOtherSubAllergyBox(allergy_sub_id,allergy_id) {
        //console.log('allergy_id '+allergy_id+' Sub '+allergy_sub_id);
        // if(allergy_id == 1 && allergy_sub_id == 4) {
        //     $('#other_sub').slideDown();
        // }else if(allergy_id == 2 && allergy_sub_id == 5) {
        //     $('#other_sub').slideDown();
        // }else if(allergy_id == 3 && allergy_sub_id == 10) {
        //     $('#other_sub').slideDown();
        // }else{
        //     $('#other_sub').val('');
        //     $('#other_sub').slideUp();
        // }

        $('#allergy_remarks').slideDown();
    }

    $('.addMoreEnt').click(function() {
        $latest_ent_disease_list = $('.ent-disease:last');
        $ent_clone   = $latest_ent_disease_list.clone(true, true);
        //console.log($ent_clone.html());
        $('.ent-disease:last').after($ent_clone);
    });

    $('.addNewEnt').click(function() {
        $('#ENTDiseaseBox').show();
    });


    $('#AddENTDisease').click(function() {
        var disease_name = '';
        sub_disease_name = $('#ent_disease_name').val();
        $disease_id      = 1;

        url      = '';
        data     = '';

        url = "{{ route('api.add_sub_disease') }}";
        data = '&disease_id='+$disease_id+'&sub_disease_name='+sub_disease_name;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {
                console.log(resp);
            },
            success : function(resp) {
                alert('Disease added successfully !');
                $('#ENTDiseaseBox').hide();
                loadEntList();
            }
        });

    });


    function loadEntList() {
        $disease_id = 1;
        url      = '';
        data     = '';

        url = "{{ route('api.sub_disease_list') }}";
        data = '&disease_id='+$disease_id;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {

            },
            success : function(resp) {
                renderENTui(resp);
            }
        });
    }

    function renderENTui(resp) { 
        html = '';
        html += '<option value=""> Select ENT Disease</option>';
        $.each(resp, function(key,value) {
            html += '<option name="ent_sub_disease_id[]" value="'+value.id+'"> '+value.name+'</option>';
        });
        $('#entSubDiseaseList').html(html);
    }

    //DENTAL

    $('.addNewDental').click(function() {
        $('#DentalDiseaseBox').show();
    });

    function loadDentalList() {
        $disease_id = 3;
        url      = '';
        data     = '';

        url = "{{ route('api.sub_disease_list') }}";
        data = '&disease_id='+$disease_id;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {

            },
            success : function(resp) {
                renderDentalui(resp);
            }
        });
    }

    function renderDentalui(resp) { 
        html = '';
        html += '<option value=""> Select Dental Disease</option>';
        $.each(resp, function(key,value) {
            html += '<option name="dental_sub_disease_id[]" value="'+value.id+'"> '+value.name+'</option>';
        });
        $('#dentalSubDiseaseList').html(html);
    }


    $('#AddDentalDisease').click(function() {
        var disease_name = '';
        sub_disease_name = $('#dental_disease_name').val();
        $disease_id      = 3;

        url      = '';
        data     = '';

        url = "{{ route('api.add_sub_disease') }}";
        data = '&disease_id='+$disease_id+'&sub_disease_name='+sub_disease_name;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {
                console.log(resp);
            },
            success : function(resp) {
                alert('Disease added successfully !');
                $('#DentalDiseaseBox').hide();
                loadDentalList();
            }
        });

    });

    $('.addMoreDental').click(function() {
        $latest_dental_disease_list = $('.dental-disease:last');
        $clone   = $latest_dental_disease_list.clone(true, true);
        console.log($clone);
        $('.dental-disease:last').after($clone);
    });

    //Paediatrics List

    $('.addNewPaediatrics').click(function() {
        $('#PaediatricsDiseaseBox').show();
    });

    $('.paediatrics_disease_id').change(function(){
        $diseaseId = '';
        $diseaseId = $(this).val();
console.log($diseaseId);
        data = '';
        url = '';
        if($diseaseId > 0) {
            //blockUI();
            data = '&disease_id='+$diseaseId,
            url  = "{{ route('api.sub_disease_list') }}",
            $.ajax({
                //paediatrics_disease_id
                data : data,
                url  : url, 
                dataType : 'json',
                type : 'get',

                error : function(resp) {
                    //unblockUI();
                },

                success : function(resp) {
                    //unblockUI();
                    console.log(resp);
                    renderPaediatricsUi(resp);
                }
            }); 
        }
       
    });
    

    function renderPaediatricsUi(resp) {
        html = '';
        html += '<option value=""> Select Paediatric Disease</option>';
        $.each(resp, function(key,value) {
            html += '<option value="'+value.id+'"> '+value.name+'</option>';
        });

        console.log(html);
        $('.PaediatricSubDiseaseList:last').html(html);
    }


    $('#AddPaediatricsDisease').click(function() {
        var disease_name = '';
        sub_disease_name = $('#paediatrics_disease_name').val();
        disease_id       = $('#paediatrics_disease_id_insert').val();

        url      = '';
        data     = '';

        if(disease_id != '' && sub_disease_name != '') {
            url = "{{ route('api.add_sub_disease') }}";
            data = '&disease_id='+disease_id+'&sub_disease_name='+sub_disease_name;
            console.log(data); 
            
            $.ajax({
                url : url,
                data : data,
                type : 'get',
                dataType : 'json',
                error : function(resp) {
                    console.log(resp);
                },
                success : function(resp) {
                    alert('Disease added successfully !');
                    $('#PaediatricsDiseaseBox').hide();
                    loadDentalList();
                }
            }); 
        }else{
            alert('Organ system and disease name cannot be empty !');
        }
    });

     $('.addMorePaediatric').click(function() {
        $latest_paeiatric_disease_list = $('.paediatrics-disease:last');
        $paeiatric_clone   = $latest_paeiatric_disease_list.clone(true, true);
        $latest_paeiatric_disease_list.after($paeiatric_clone);
    });

     //EYE
     //DENTAL

    $('.addNewEye').click(function() {
        $('#EyeDiseaseBox').show();
    });

    function loadEyeList() {
        $disease_id = 11;
        url      = '';
        data     = '';

        url = "{{ route('api.sub_disease_list') }}";
        data = '&disease_id='+$disease_id;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {

            },
            success : function(resp) {
                renderEyeui(resp);
            }
        });
    }

    function renderEyeui(resp) { 
        html = '';
        html += '<option value=""> Select Eye Disease</option>';
        $.each(resp, function(key,value) {
            html += '<option value="'+value.id+'"> '+value.name+'</option>';
        });
        $('#eyeSubDiseaseList').html(html);
    }

    $('.addMoreEye').click(function() {
        $latest_eye_disease_list = $('.eye-disease:last');
        $eye_clone   = $latest_eye_disease_list.clone(true, true);
        $('.eye-disease:last').after($eye_clone);
    });

    $('#AddEyeDisease').click(function() {
        var disease_name = '';
        sub_disease_name = $('#eye_disease_name').val();
        $disease_id      = 11;

        url      = '';
        data     = '';

        url = "{{ route('api.add_sub_disease') }}";
        data = '&disease_id='+$disease_id+'&sub_disease_name='+sub_disease_name;

        $.ajax({
            url : url,
            data : data,
            type : 'get',
            dataType : 'json',
            error : function(resp) {
                console.log(resp);
            },
            success : function(resp) {
                alert('Disease added successfully !');
                $('#EyeDiseaseBox').hide();
                loadEyeList();
            }
        });

    });



    function loadDepartments() {
        url      = '';
        data     = '';

        url = "{{ route('api.get_all_departments') }}";

        $.ajax({
            url : url,
            type : 'get',
            dataType : 'json',
            error : function(resp) {

            },
            success : function(resp) {
                renderDeptUi(resp);
            }
        });
    }

    function renderDeptUi(resp) { 
        html = '';
        html += '<option value=""> Select Separtment</option>';
        $.each(resp, function(key,value) {
            html += '<option name="department_id[]" value="'+value.id+'"> '+value.name+'</option>';
        });
        $('#department').html(html);
    }



    $('.addNewDepartment').click(function() {
        $('#addDepartmentBox').slideDown();
    });

    $('#btnAddDepartment').click(function(e) {
        e.preventDefault();
        $department_name = $('#department_name').val();
        if($department_name != '') {
            data = '';
            url  = '';

            url     += "{{ route('api.add_new_department') }}";
            data    += '&department_name='+$department_name;

            $.ajax({
                url  : url,
                data : data,
                type : 'get',

                error : function(resp) {
                    console.log(resp);
                    alert('Oops ! Something went wrong. Please try again.');
                },

                success : function(resp) {
                  console.log(resp);  
                  if(resp) {
                    alert('added successfully');
                    $('#addDepartmentBox').slideUp();
                    loadDepartments();
                  }else{
                    alert('Department create failed !');
                  }
                } 
            });
        }
    })
</script>
@stop
