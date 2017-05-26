@extends('layouts.school_admin')

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="stats_bar">
          

          <div data-step="2" data-intro="" class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/students.png') }}">
                <span id="total_clientes">{{ $students_count }}</span>
                <h2>STUDENTS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>

        
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/boy.png') }}">
                <span id="total_clientes">{{ $students_count_male }}</span>
                <h2>BOYS</h2>
                
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/girl.png') }}">
                <span id="total_clientes">{{ $students_count_female }}</span>
                <h2>GIRLS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
        </div>
       </div>


      <!--Reports-->
      <div class="row dash-cols">
       <div class="widget-block">
          <div class="white-box padding">
             <div class="row info text-shadow">
                <div class="col-xs-12">
                   <h3>Reports</h3>
                </div>
                {!! Form::open(array('route' => 'school_admin.checkup_report', 'id' => 'school_admin.checkup_report', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
                  <div class="col-xs-6">
                     <div id="com2_stats">

                          <div class="form-group">
                             {!! Form::label('school_registration_number', 'School Reg No', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                               {!! Form::text('school_registration_number', null, ['class' => ' form-control', 'id' => 'class', 'placeholder' => 'All School Reg Number' ]) !!}
                             </div>
                          </div>

                          <div class="form-group">
                             {!! Form::label('class', 'Select Class', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                {!! Form::select('class', $classes, null, ['class' => ' select2other', 'id' => 'studentclass', 'placeholder' => 'Select Class' ]) !!}
                             </div>
                          </div>

                          <div class="form-group section-deps" id="sectionHolder">
                             {!! Form::label('section', 'Select Section', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                <select name="section" id="section" class="form-control"></select>
                             </div>
                          </div>

                          <div class="form-group section-deps" id="semesterHolder">
                             {!! Form::label('semester', 'Select Semester', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                <select name="semester" id="semester" class="form-control"></select>
                             </div>
                          </div>

                          <div class="form-group section-deps" id="branchHolder">
                             {!! Form::label('branch', 'Select Branch', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                <select name="branch" id="branch" class="form-control"></select>
                             </div>
                          </div>

                          <div class="form-group section-deps" id="streamHolder">
                             {!! Form::label('stream', 'Select Stream', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                <select name="stream" id="stream" class="form-control"></select>
                             </div>
                          </div>

                          <div class="form-group">
                             {!! Form::label('registration_number', 'Projectchild Reg No', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                               {!! Form::text('registration_number', null, ['class' => ' form-control', 'id' => 'class', 'placeholder' => 'Select Reg Number' ]) !!}
                             </div>
                          </div>
                          
                     </div>
                  </div>


                  <div class="col-xs-6">
                     <div id="com2_stats">
                        <div class="form-group">
                              {!! Form::label('disease_id', 'Organ System', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                {!! Form::select('disease_id', $diseases, null, ['class' => 'form-control', 'id' => 'disease_id', 'placeholder' => 'Select Disease' ]) !!}
                             </div>
                        </div>

                        <div class="form-group">
                              {!! Form::label('sub_disease_id', 'Sub Disease', array('class' => 'col-sm-3 control-label')) !!}
                             <div class="col-sm-9">
                                <select name="sub_disease_id" id="sub_disease_id" class="form-control"></select>
                             </div>
                        </div>

                        <?php
                          $base_year = 2008;
                        ?>
                        <div class="form-group">
                           <label class="col-sm-3 control-label"> Checkup Year </label>
                           <div class="col-sm-9">
                                {!! Form::select('checkup_year', $checkup_years, null, ['class' => 'select2other', 'id' => 'checkup_years', 'placeholder' => 'All Checkups' ]) !!}
                           </div>
                        </div>

                        <div class="form-group">
                           {!! Form::label('first_name', '', array('class' => 'col-sm-3 control-label')) !!}
                           <div class="col-sm-9">
                             {!! Form::text('first_name', null, ['class' => ' form-control', 'id' => 'first_name', 'placeholder' => 'Enter First Name' ]) !!}
                           </div>
                        </div>

                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-primary">View</button></div>
                  </div>
                {!! Form::close() !!}
             </div>
          </div>
       </div>
  </div>
</div>
@endsection

@section('page_scripts')
<script>

  $('#studentclass').change(function() {
    $class = $(this).val();
    if($class > 0) {
      var data = '';
      var url  = '';

      data += '&class_id='+$class;
      url  += "{{ route('api.get_class_subs') }}";

      $.ajax({
        data : data,
        type : 'get',
        dataType : 'json',
        url  : url,

        error : function(resp) {
          //alert('Error');
          $('#semesterHolder').hide();
          $('#sectionHolder').hide();
          $('#streamHolder').hide();
        },

        success : function(resp) {
          console.log(resp);
          if(resp.type == 'section') {
            renderSection(resp.data);
          }else if(resp.type == 'semester') {
            renderSemester(resp.data);
          }else if(resp.type == 'stream') {
            renderStream(resp.data);
          }
          // else if(resp.type == 'branch') {
          //   renderBranch(resp.data);
          // }
        }

      });
    }
  });

  $('#disease_id').change(function() {
    $('#sub_disease_id').empty();
    $disease_id = $(this).val();

    if($disease_id > 0) {
      $.blockUI();
      var data = '';
      var url  = '';

      data += '&disease_id='+$disease_id;
      url  += "{{ route('api.sub_disease_list') }}";

      $.ajax({
        data : data,
        url  : url,
        type : 'GET',
        dataType : 'json',

        error : function(resp) {
          $.unblockUI();
          alert('Something went wrong !');
          console.log(resp);

        },
        success : function(resp) {
          $.unblockUI();
          buildJson(resp);
        }
      });

      function buildJson(jsonObject) {
        var html = '';
        html += '<option value="">Select Sub Disease</option>';
        $.each(jsonObject, function(key,val){
            html += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $('#sub_disease_id').html(html);
      }
      
    }
  });

  

  function renderSection(data) {
    html = '';
    html += '<option value="">Select Section</option>';
    $.each(data, function(key,val){
        html += '<option value="'+val.name+'">'+val.name+'</option>';
    });

    $('#streamHolder').hide();
    $('#semesterHolder').hide();

    $('#sectionHolder').show();
    $('#section').html(html);
  }

  function renderSemester(data) {
    html = '';
    html += '<option value="">Select Semester</option>';
    $.each(data, function(key,val){
        html += '<option value="'+val.name+'">'+val.name+'</option>';
    });

    $('#streamHolder').hide();
    $('#sectionHolder').hide();

    $('#semesterHolder').show();
    $('#semester').html(html);
  }

  function renderStream(data) {
    html = '';
    html += '<option value="">Select Stream</option>';
    $.each(data, function(key,val){
        html += '<option value="'+val.name+'">'+val.name+'</option>';
    });

    $('#semesterHolder').hide();
    $('#sectionHolder').hide();
    
    $('#streamHolder').show();
    $('#stream').html(html);
  }

  function renderBranch(data) {
    html = '';
    html += '<option value="">Select Branch</option>';
    $.each(data, function(key,val){
        html += '<option value="'+val.name+'">'+val.name+'</option>';
    });
    $('#branchHolder').show();
    $('#branch').html(html);
  }

  //show school reg number
  $('#school_id').change(function() {
    if($(this).val() > 0) {
      $('#schoolRegNo').show();
    }else{
      $('#schoolRegNo').hide();
    }
  });
</script>
@stop

@section('page_css')
<style>
.section-deps {
  display: none;
}
</style>
@stop