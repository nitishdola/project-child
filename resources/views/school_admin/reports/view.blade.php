@extends('layouts.school_admin')

@section('page_css')
<style>
table th {
  text-align: center;
  color: #222;
}
table thead {
  background: #DBCC64;
}
</style>
@stop

@section('main_content')
<div id="pcont" class="container-fluid">

      <div class="container-fluid">
        <div class="page-head">
          <h2>Reports Result :</h2>
          @include('school_admin.reports._search_form')
        </div>
      </div>

       <div class="stats_bar container-fluid">
          @if(count($results))
          <?php $count = 1;
          ?>
          <div class="col-md-5 pull-right">
            <strong>BMI</strong> :
                  <button class="btn underweight">0 - 18.5 <br> ( Underweight )</button>
                  <button class="btn btn-success">18.5 - 24.9 <br> ( Healthy weight )</button>
                  <button class="btn btn-warning">25 - 29.9 <br>( Overweught )</button>
                  <button class="btn btn-danger">30 - <br> (Obese)</button>
          </div>

          <table class="table table-hover">
            <thead>
              <tr>
                <th> # </th>
                <th> Student Name </th>
                <th> Reg Number </th>
                <th> Gender </th>
                <th> Class </th>
                <th> Section/Semester </th>
                <th> Height </th>
                <th> Weight </th>
                <th> BMI </th>
                <th> History </th>
                <th> View/Print </th>
              </tr>
            </thead>

            <tbody id="student_list">
            @foreach( $results as $k => $v)
            @if($v->height >= 0)
            <tr>
              <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
              <td> {{ $v->studentFName }} {{ $v->studentMName }} {{ $v->studentLName }} </td>
              <td> {{ $v->registration_number }}</td>
              <td> {{ $v->sex }} </td>
              <td> {{ $v->class }} </td>
              <td>
              {{ $v->section }}
              {{ $v->stream }}
              </td>
              <td> {{ $v->height }} </td>
              <td> {{ $v->weight }} </td>

             <?php
             if($v->height > 0){
                 //BMI
                 $bmi = $v->weight/( ($v->height/100)*($v->height/100) );
                 $class = 'btn-info';
                 if($bmi < 18.5 ) {
                  $class = 'underweight';
                 }else if($bmi>=18.5 && $bmi <=24.9) {
                  $class = 'btn-success';
                 }else if($bmi>=25 && $bmi <=29.9) {
                  $class = 'btn-warning';
                 }else{
                  $class = 'btn-danger';
                 }
              }else{
                $bmi = 10.00;
                $class = 'noresult';
              }
             ?>
             <td>

             <button class="btn {{ $class}} btn-xs">{{ number_format((float)$bmi, 2, '.', '') }} </button>

             </td>
              <td> {{ ucfirst($v->studentHistory) }}</td> 

              <td> <a href="{{ route('school_admin.view_student_info', Crypt::encrypt($v->studentId)) }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-print" aria-hidden="true"></i> View/Print</a></td>

            </tr>
            @endif
            @endforeach
            </tbody>
          </table>

          <div class="pagination">
            {!! $results->appends(Input::except('page'))->render() !!}
          </div>

          @else
          <div class="alert alert-danger alert-dismissable alert-red">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
            No Items Found !
          </div>
          @endif
       </div>
    </div>
 </div>
@endsection


@section('page_scripts')
<script>
$(document).ready(function() {
  $disease_id = $('#disease_id').val();
  if($disease_id > 0)
  prepareSubDiseaseList($disease_id);
  render_section_data();
});
$('#disease_id').change(function() {
  $disease_id = $('#disease_id').val();
  prepareSubDiseaseList($disease_id);
});

function prepareSubDiseaseList() {
  $('#sub_disease_id').empty();

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
        var sub_disease_id = "{{ $sub_disease_id }}";
        var html = '';
        html += '<option value="">Select Sub Disease</option>';
        $.each(jsonObject, function(key,val){
            if(sub_disease_id == val.id) {
              html += '<option selected="selected" value="'+val.id+'">'+val.name+'</option>';
            }else{
              html += '<option value="'+val.id+'">'+val.name+'</option>';
            }

        });
        $('#sub_disease_id').html(html);
      }

    }
}

$('#studentclass').change(function() { 
    $class = $(this).val();
    if($class > 0) {
      render_section_data($class);
    }
  });

function render_section_data() {
  $class = $('#studentclass').val();
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
}

function renderSection(data) {
    section = "{{ $section }}";
    html = '';
    html += '<option value="">Select Section</option>';
    $.each(data, function(key,val){
        if( section!= '') {
          if(section == val.name) {
            html += '<option selected="selected" value="'+val.name+'">'+val.name+'</option>';    
          }
        }
        html += '<option value="'+val.name+'">'+val.name+'</option>';
    });

    $('#streamHolder').hide();
    $('#semesterHolder').hide();
    $('#branchHolder').hide();
    $('#sectionHolder').show();
    $('#section').html(html);
  }

  function renderSemester(data) {
    semester = "{{ $semester }}";
    html = '';
    html += '<option value="">Select Semester</option>';
    $.each(data, function(key,val){
        if( semester!= '') {
          if(semester == val.name) {
            html += '<option selected="selected" value="'+val.name+'">'+val.name+'</option>';    
          }
        }
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
