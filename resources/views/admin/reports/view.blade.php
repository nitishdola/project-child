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
    <div class="cl-mcont"><h2> Report : </h2>
       <div class="stats_bar">
          @if(count($results))
          <?php $count = 1; 
          ?>

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
                  $class = 'btn-warning';
                 }else if($bmi>=18.5 && $bmi <=24.9) {
                  $class = 'btn-success';
                 }else if($bmi>=25 && $bmi <=29.9) {
                  $class = 'btn-warning';
                 }else{
                  $class = 'btn-danger';
                 }
              }else{
                $bmi = 10.00;
                $class = 'btn-warning';
              }
             ?>
             <td> 

             <button class="btn {{ $class}} btn-xs">{{ number_format((float)$bmi, 2, '.', '') }} </button>

             </td>
              <td> <a href="{{ route('student.info', Crypt::encrypt($v->studentId)) }}" class="btn btn-success btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</a></td>
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


