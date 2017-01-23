@extends('layouts.admin')

@section('page_css')
<style>
.disease-list {
	text-align: left;
}
.disease-list ul li {
	list-style: none;
	padding:5px 0;
}
div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
.fa-th {
	color: #ED4C6A;
}
</style>
@stop

@section('main_content')
<div class="container-fluid" style="margin-top: 2%; background: url('{{ asset("assets/img/dot-background.jpg") }}');">
    <div class="cl-mcont">
       <div class="stats_bar">
       		<div class="row">
       			<div class="col-md-8">
       				<div class="alert alert-info alert-white rounded"><div class="icon"><i class="fa fa-info-circle"></i></div><strong>Overall Health Index</strong></div>
       			</div>
       		</div>

       		<div class="row">
       			<div class="col-md-3">
       				<img src="{{ asset('assets/img/icons/littlebill.png')}}" class="img-responsive" height="650" width="650">
       			</div>

       			<div class="col-md-4 disease-list">
       				
       				<ul class="diseases">
       					<li"><i class="fa fa-th" aria-hidden="true"></i> Power Glass / Squint </li>
       					<li><i class="fa fa-th" aria-hidden="true"></i> Dental Care / Plaque </li>
       					<li><i class="fa fa-th" aria-hidden="true"></i> Power Glass / Squint </li>
       					<li><i class="fa fa-th" aria-hidden="true"></i> Dental Care / Plaque </li>
       				</ul>

       				<div class="hor-pie">
       					<div style="margin-top: 5px; font-weight: bold">BMI</div>

							<div style="height:150px">
							    <div id="bulletgraph"></div>
							</div>
       				</div>
       			</div>

       		</div>

       		<div class="row">
       			<div class="col-md-8">
       				<div class="alert alert-success alert-white rounded"><div class="icon"><i class="fa fa-stethoscope"></i></div><strong>Helath Summary</strong></div>
       			</div>
       		</div>

       		<div class="row">
       			<div class="col-md-8">
       			<h3>Additional ECG. regular Opththalmogosist, dentist care.</h3>
       			</div>
       		</div>

       </div>
    </div>
</div>
<!-- Ignite UI Required Combined CSS Files -->
<link href="http://cdn-na.infragistics.com/igniteui/2016.2/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
<link href="http://cdn-na.infragistics.com/igniteui/2016.2/latest/css/structure/infragistics.css" rel="stylesheet" />

<!-- Used to style the API Viewer and Explorer UI -->
<link href="http://www.igniteui.com/css/apiviewer.css" rel="stylesheet" type="text/css" />


@stop

@section('page_scripts')
<script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

<!-- Ignite UI Required Combined JavaScript Files -->
<script src="http://cdn-na.infragistics.com/igniteui/2016.2/latest/js/infragistics.core.js"></script>
<script src="http://cdn-na.infragistics.com/igniteui/2016.2/latest/js/infragistics.dv.js"></script>
<script>
	$("#bulletgraph").igBulletGraph({
    height: "80px",
    width: "100%",
    minimumValue: 0, // default is 0
    maximumValue: 31, // default is 100
    interval: 5,
    value: 17,
    //targetValue: 21,
    ranges: [
        {
            name: 'obese',
            startValue: 30,
            endValue: 50,
            color: "red"
        },
        {
            name: 'underweight',
            startValue: 0,
            endValue: 18.5,
            color: "#D97B16"
        },
        {
            name: 'good',
            startValue: 18.5,
            endValue: 24.99999,
            color : "green"
        },
        {
            name: 'overweight',
            startValue: 25,
            endValue: 29.99999,
            color : "#D64C0F"
        }
        ], 
    formatLabel: function (evt, ui) {
            ui.label = ui.label;
        }
});
</script>
@stop