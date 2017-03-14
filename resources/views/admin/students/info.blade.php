@extends('layouts.admin')

@section('page_css')
<style>
.left-align,.disease-list {
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
.fa-user-circle {
	color: #EE4D1C;
}
.fa-universal-access {
	color: #CD9D1B;
}
.fa-upload {
	color: #5A88AD;
}

.fa-calendar {
  color: #60C060;
}
.fa-genderless {
  color: #F60707;
}
.table-fixed{
  height: 490px;
  overflow-y: auto;
  width: 100%;
}
.scroll-wrapper {
    overflow: hidden !important;
    padding: 0 !important;
    position: relative;
}
 
.scroll-wrapper > .scroll-content {
    border: none !important;
    box-sizing: content-box !important;
    height: auto;
    left: 0;
    margin: 0;
    max-height: none;
    max-width: none !important;
    overflow: scroll !important;
    padding: 0;
    position: relative !important;
    top: 0;
    width: auto !important;
}
 
.scroll-wrapper > .scroll-content::-webkit-scrollbar {
    height: 0;
    width: 0;
}
 
.scroll-element {
    display: none;
}
.scroll-element, .scroll-element div {
    box-sizing: content-box;
}
 
.scroll-element.scroll-x.scroll-scrollx_visible,
.scroll-element.scroll-y.scroll-scrolly_visible {
    display: block;
}
 
.scroll-element .scroll-bar,
.scroll-element .scroll-arrow {
    cursor: default;
}
 
.scroll-textarea {
    border: 1px solid #cccccc;
    border-top-color: #999999;
}
.scroll-textarea > .scroll-content {
    overflow: hidden !important;
}
.scroll-textarea > .scroll-content > textarea {
    border: none !important;
    box-sizing: border-box;
    height: 100% !important;
    margin: 0;
    max-height: none !important;
    max-width: none !important;
    overflow: scroll !important;
    outline: none;
    padding: 2px;
    position: relative !important;
    top: 0;
    width: 100% !important;
}
.scroll-textarea > .scroll-content > textarea::-webkit-scrollbar {
    height: 0;
    width: 0;
}
 

/*************** SIMPLE INNER SCROLLBAR ***************/
 
.scrollbar-inner > .scroll-element,
.scrollbar-inner > .scroll-element div
{
    border: none;
    margin: 0;
    padding: 0;
    position: absolute;
    z-index: 10;
}
 
.scrollbar-inner > .scroll-element div {
    display: block;
    height: 100%;
    left: 0;
    top: 0;
    width: 100%;
}
 
.scrollbar-inner > .scroll-element.scroll-x {
    bottom: 2px;
    height: 8px;
    left: 0;
    width: 100%;
}
 
.scrollbar-inner > .scroll-element.scroll-y {
    height: 100%;
    right: 2px;
    top: 0;
    width: 8px;
}
 
.scrollbar-inner > .scroll-element .scroll-element_outer {
    overflow: hidden;
}
 
.scrollbar-inner > .scroll-element .scroll-element_outer,
.scrollbar-inner > .scroll-element .scroll-element_track,
.scrollbar-inner > .scroll-element .scroll-bar {
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
}
 
.scrollbar-inner > .scroll-element .scroll-element_track,
.scrollbar-inner > .scroll-element .scroll-bar {
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
    filter: alpha(opacity=40);
    opacity: 0.4;
}
 
.scrollbar-inner > .scroll-element .scroll-element_track { background-color: #e0e0e0; }
.scrollbar-inner > .scroll-element .scroll-bar { background-color: #c2c2c2; }
.scrollbar-inner > .scroll-element:hover .scroll-bar { background-color: #919191; }
.scrollbar-inner > .scroll-element.scroll-draggable .scroll-bar { background-color: #919191; }
 
 
/* update scrollbar offset if both scrolls are visible */
 
.scrollbar-inner > .scroll-element.scroll-x.scroll-scrolly_visible .scroll-element_track { left: -12px; }
.scrollbar-inner > .scroll-element.scroll-y.scroll-scrollx_visible .scroll-element_track { top: -12px; }
 
 
.scrollbar-inner > .scroll-element.scroll-x.scroll-scrolly_visible .scroll-element_size { left: -12px; }
.scrollbar-inner > .scroll-element.scroll-y.scroll-scrollx_visible .scroll-element_size { top: -12px; }


.progress {
  height: 35px;

}
.progress .skill {
  line-height: 35px;
  padding: 0;
  margin: 0 0 0 20px;
  text-transform: uppercase;
}
.progress .skill .val {
  float: right;
  font-style: normal;
  margin: 0 20px 0 0;
}

.progress-bar {
  text-align: left;
  transition-duration: 3s;
}
.info-box {
-webkit-box-shadow: 1px 2px 8px -45px rgba(102,102,102,0.62);
-moz-box-shadow: 1px 2px 8px -45px rgba(102,102,102,0.62);
box-shadow: 1px 2px 8px -45px rgba(102,102,102,0.62);
-moz-border-radius:5px;
-webkit-border-radius:5px;
border-radius:5px;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/dataTables.bootstrap.min.css" />

@stop

@section('main_content')
<div class="container-fluid">
  <div class="cl-mcont">
    <div class="stats_bar">
   		<div class="row">
   			<div class="col-md-7">
   				<div class="alert alert-success alert-white rounded"><div class="icon"><i class="fa fa-stethoscope"></i></div>

            <div class="col-md-12 header left-align">
                <h4>
                <i class="fa fa-user-circle" aria-hidden="true"></i> {{ $student_info->name }}

                <i class="fa fa-universal-access" aria-hidden="true"></i> {{ $last_checkup->height }} centi meters

                <i class="fa fa-upload" aria-hidden="true"></i> {{ $last_checkup->weight }} kg
                </h4>
            </div>

            <div class="col-md-3 left-align">
              <i class="fa fa-calendar" aria-hidden="true"></i> DOB {{ date('d/m/Y', strtotime($student_info->dob)) }}
            </div>

            <div class="col-md-9">
              <i class="fa fa-genderless" aria-hidden="true"></i> Blood Grop {{ $student_info->blood_group['name'] }}
            </div>
            

          </div>
       		<div class="col-md-12 block-flat info-box">
       			<div class="col-md-3">
       				<img src="{{ asset('assets/img/icons/littlebill.png')}}" class="img-responsive" height="650" width="650">
       			</div>

       			<div class="col-md-4 disease-list">
       				
       				<ul class="diseases">
       					@foreach($diseases as $disese)
       					<li><i class="fa fa-th" aria-hidden="true"></i> {{ $disese->subDiseaseName }} ( {{ $disese->diseasesName }} ) </li>
       					@endforeach
       				</ul>

       				<div class="hor-pie">
       					<!-- <div style="margin-top: 5px; font-weight: bold">BMI</div>
  							<div style="height:150px">
  							    <div id="bulletgraph"></div>
  							</div> -->
                <?php 

                    //BMI
                    $student_bmi = ($last_checkup->weight) / ( ($last_checkup->height/100)*($last_checkup->height/100) );
                      $bmi_class = 'btn-info';
                    if($student_bmi < 18.5 ) {
                      $bmi_class = 'progress-bar-warning_below';
                    }else if($student_bmi >=18.5 && $student_bmi <=24.9) {
                      $bmi_class = 'btn-success';
                    }else if($student_bmi >=25 && $student_bmi <=29.9) {
                      $bmi_class = 'progress-bar-warning';
                    }else{
                      $bmi_class = 'btn-danger';
                    }
                ?>
                <div class="progress skill-bar">
                    <div class="progress-bar {{ $bmi_class }}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <span class="skill">BMI {{ number_format((float)$student_bmi, 2, '.', '') }}<i class="val">{{ $student_bmi }}</i></span>
                    </div>
                </div> 
       				</div>
            </div>

            <div class="col-md-6">
              Checkup Date : <strong><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ date('d F Y', strtotime($last_checkup->checkup_date))  }}</strong>
            </div>
          </div>

          <div class="col-md-12 block-flat info-box">
            <div class="block-flat">
              <div class="header">
                <h3> Other students ( Same Class ) </h3>
              </div>
              <div class="content">
                @if(count($similar_students))
                  <?php $count = 1; ?>

                  <div class="table-fixed scrollbar-inner">
                    <table id="datatable" class="table table-hover" style="width:98% !important; table-layout:fixed">
                      <thead>
                        <tr>
                          <!-- <th class="col-md-1"> # </th> -->
                          <th class="col-md-3"> Student Name </th>
                          <th class="col-md-2"> Height </th>
                          <th class="col-md-2"> Weight </th>
                          <th class="col-md-2"> BMI </th>
                          <th class="col-md-2"> View Details </th>
                        </tr>
                      </thead>

                      <tbody id="student_list">
                      @foreach( $similar_students as $k => $v)
                      <tr>
                        <!-- <td> {{ (($similar_students->currentPage() - 1 ) * $similar_students->perPage() ) + $count + $k }} </td> -->
                        <td> {{ $v->studentName }} </td>
                        <td> {{ $v->height }} </td>
                        <td> {{ $v->weight }} </td>

                       <?php 

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
                       ?>
                       <td> 

                       <button class="btn {{ $class}} btn-xs">{{ number_format((float)$bmi, 2, '.', '') }} </button>

                       </td>
                        <td> <a href="{{ route('student.info', Crypt::encrypt($v->studentId)) }}" class="btn btn-info btn-sm"> Info</a></td>
                      </tr>
                      @endforeach 
                      </tbody>
                    </table>
                  </div>
                  <div class="pagination">
                    {!! $similar_students->render() !!}
                  </div>
                @else
                <div class="alert alert-danger alert-dismissable alert-red">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                  No Students Found !
                </div>
                @endif
              </div>
          </div>
          </div>
        </div>
        <!--leaft block ends-->
        <!--similar students block begins-->
        <div class="col-sm-5 col-md-5 block-flat info-box">

          <div class="col-md-12 block-flat info-box">
            
            @if(count($findings))
              <div class="alert alert-success alert-white rounded">
                <div class="icon"><i class="fa fa-stethoscope"></i></div><strong>Health Summary/Findings</strong>
              </div>

              @foreach($findings as $k => $v)
                <h4> {{ $v->finding }} </h4>
              @endforeach
            @else 
            <div class="alert alert-warning alert-white rounded">
              <div class="icon"><i class="fa fa-info-circle"></i></div><strong>No Findings Found !</strong>
            </div>
            @endif
          </div>

          <div class="col-md-12 block-flat info-box">
            <div class="alert alert-success alert-white rounded">
              <div class="icon"><i class="fa fa-stethoscope"></i></div><strong>Vaccination Report</strong>
              @foreach($vaccinations as $k => $v)
                <h4> {{ $v->vaccine['name'] }} </h4>
              @endforeach

            </div>

            <div class="progress-factor flexy-item">
              <div class="progress-bar">
                <div class="bar has-rotation has-colors navy ruler" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" id="bar-0_0">
                  <div class="tooltip white"></div>
                  <div class="bar-face face-position roof percentage"></div>
                  <div class="bar-face face-position back percentage"></div>
                  <div class="bar-face face-position floor percentage volume-lights"></div>
                  <div class="bar-face face-position left"></div>
                  <div class="bar-face face-position right"></div>
                  <div class="bar-face face-position front percentage volume-lights shine"></div>
                </div>
              </div>
            </div>
           <!--  <div id="container" style="min-width: 310px; height: 400px; max-width: 1200px; margin: 0 auto"></div> -->

          </div>
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

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script>

$('#datatable').DataTable( {
    "paging":   false,
    "ordering": false,
    "info":     false
} );

//jQuery('.scrollbar-outer').scrollbar();

$('.progress .progress-bar').css("width",
  function() {
      return $(this).attr("aria-valuenow") + "%";
  }
)
</script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
        radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
        },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});

// Build the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares. January, 2015 to May, 2015'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Brands',
        data: [
            { name: 'Microsoft', y: 56.33 },
            {
                name: 'Chrome',
                y: 24.03,
                sliced: true,
                selected: true
            },
            { name: 'Firefox', y: 10.38 },
            { name: 'Safari', y: 4.77 }, { name: 'Opera', y: 0.91 },
            { name: 'Proprietary or Undetectable', y: 0.2 }
        ]
    }]
});
</script>
@stop