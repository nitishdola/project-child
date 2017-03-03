@extends('layouts.admin')

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
          {!! Form::open(array('route' => 'reports.data', 'id' => 'reports.data', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
            <div class="col-xs-6">
               <div id="com2_stats">
                  <div class="form-group">
                        {!! Form::label('school_id', 'Select School', array('class' => 'col-sm-3 control-label')) !!}
                       <div class="col-sm-9">
                          {!! Form::select('school_id', $schools, $school_id, ['class' => 'select2', 'id' => 'school_id', 'placeholder' => 'Seelct School' ]) !!}
                       </div>
                    </div>
                    <div class="form-group">
                       {!! Form::label('class', 'Select Class', array('class' => 'col-sm-3 control-label')) !!}
                       <div class="col-sm-9">
                          {!! Form::text('class', $class, ['class' => 'form-control', 'id' => 'class', 'placeholder' => 'Enter Class' ]) !!}
                       </div>
                    </div>

                    <div class="form-group">
                       {!! Form::label('class', 'Select Gender', array('class' => 'col-sm-3 control-label')) !!}
                       <div class="col-sm-9">
                          <div class="radio"><label><input type="radio" @if($sex == 'male') checked="checked" @endif value="male"  name="sex" class="icheck"> Male</label></div>
                          <div class="radio"><label><input type="radio" @if($sex == 'female') checked="checked" @endif name="sex" value="female" class="icheck"> Female</label></div>
                       </div>
                    </div>

               </div>
            </div>


            <div class="col-xs-6">
               <div id="com2_stats">
                  <div class="form-group">
                        {!! Form::label('disease_id', 'Organ System', array('class' => 'col-sm-3 control-label')) !!}
                       <div class="col-sm-9">
                          {!! Form::select('disease_id', $diseases, $disease_id, ['class' => 'form-control', 'id' => 'disease_id', 'placeholder' => 'Select Disease' ]) !!}
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
                        {!! Form::select('checkup_year', $checkup_years, $checkup_year, ['class' => 'form-control', 'id' => 'checkup_years', 'placeholder' => 'All Checkups' ]) !!}
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
                <th> Class </th>
                <th> Height </th>
                <th> Weight </th>
                <th> BMI </th>
                <th> View Details </th>
              </tr>
            </thead>

            <tbody id="student_list">
            @foreach( $results as $k => $v)
            @if($v->height >= 0)
            <tr>
              <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
              <td> {{ $v->studentName }} </td>
              <td> {{ $v->class }} </td>
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
              <td> <a href="{{ route('student.info', Crypt::encrypt($v->studentId)) }}" target="_blank" class="btn btn-info btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</a></td>
            </tr>
            @endif
            @endforeach
            </tbody>
          </table>

          <div class="pagination">
            {!! $results->render() !!}
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
</script>
@stop
