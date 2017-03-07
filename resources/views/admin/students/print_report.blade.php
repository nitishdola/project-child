@extends('layouts.admin')
@section('main_content')
<style>
  h3 {
    color: #56509F;
  }
  .fa-user-circle {
    color: #FFF;
  }
  .row {
    background: url('http://www.nolowenenowak.com/assets/noise-465951dadfced6c0955bdf4538004991.png');
  }
</style>
<div class="container-fluid">
  <div class="cl-mcont">
    <div class="stats_bar">
   		<div class="row">
        <div class="col-xs-12">
          <div class="alert alert-success alert-white rounded">
            <div class="icon"><i class="fa fa-user"></i></div>
            <h3>
              <i class="fa fa-user-circle" aria-hidden="true"></i> Siddharth Roy
            </h3>
            <h4> Holy Child School Guwahati </h4>
            <h4> Class V Section B</h4>
          </div>
        </div>

        <div class="col-xs-6">
          <div class="alert alert-success alert-white rounded">
            <div class="icon"><i class="fa fa-user"></i></div>
            <h3>
              <i class="fa fa-user-circle" aria-hidden="true"></i> Age 7
            </h3>
            <h4> DOB 21/2/2011 </h4>
            <h4> Height 122 cm Weight 40 Kg</h4>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="alert alert-success alert-white rounded">
            <div class="icon"><i class="fa fa-user"></i></div>
            <h3>
              <i class="fa fa-user-circle" aria-hidden="true"></i> BMI 28.55
            </h3>
            
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


@stop
