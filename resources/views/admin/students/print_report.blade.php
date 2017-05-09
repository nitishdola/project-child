@extends('layouts.admin')

@section('page_css')
<style>
  
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
.fa-university {
  color: #1409F6;
}
.fa-puzzle-piece {
  color: #E5C40C;
}

@media print {
  .printrow {
    display: none;
  }
}
</style>
@stop


@section('main_content') 

<div id="pcont" class="container-fluid">
  <div class="cl-mcont">
      <div class="row">
          <div class="col-xs-12">
              <div class="block-flat profile-info">
                  <div class="row">
                      <div class="col-xs-2">
                          <div class="avatar"><img src="{{ asset('assets/img/icons/littlebill.png')}}" class="img-responsive" height="650" width="650"></div>
                      </div>
                      <div class="col-xs-5">
                          <div class="personal">
                              <h3 class="name">{{ $student_info->name }}</h3>
                              <h4><i class="fa fa-university"></i> {{ $student_info->school['name'] }}</h4>
                              <h5><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Class {{ $last_checkup->class }} SEC {{ $last_checkup->section }}</h5>
                              <h5><i class="fa fa-certificate" aria-hidden="true"></i> Registration Number {{ $student_info->registration_number }} School ID {{ $student_info->school_registration_number }}</h5>
                              <h5><i class="fa fa-calendar" aria-hidden="true"></i> DOB {{ date('d/m/Y', strtotime($student_info->dob)) }}</h5>

                          </div>
                      </div>

                      <div class="col-xs-5" style="text-align: left;">
                        <h5><i class="fa fa-genderless" aria-hidden="true"></i> Blood Group {{ $student_info->blood_group['name'] }}</h5>
                        
                        <h5><i class="fa fa-upload" aria-hidden="true"></i> {{ $last_checkup->weight }} kg</h5>
                        <h5><i class="fa fa-universal-access" aria-hidden="true"></i> {{ $last_checkup->height }} centi meters</h5>

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

                        <h5> <button type="button" class="btn {{ $bmi_class }}"><span style="color: #FFF; font-weight: bold;">BMI {{ number_format((float)$student_bmi, 2, '.', '') }}</span></button> </h5>

                        

                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-8">
              <div class="tab-container">
                  <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#home">Information</a></li>
                      <li><a data-toggle="tab" href="#disease">Organ System</a></li>
                      <li><a data-toggle="tab" href="#findings">Findings</a></li>
                  </ul>
                  <div class="tab-content">
                      <div id="home" class="tab-pane active cont">
                          <table class="table no-border no-strip information">
                              <tbody class="no-border-x no-border-y">
                                  <tr>
                                      <td style="width:20%;" class="category"><strong>CONTACT</strong></td>
                                      <td>
                                          <table class="table no-border no-strip skills">
                                              <tbody class="no-border-x no-border-y">
                                                  <tr>
                                                      <td style="width:20%;"><b>Father's Name</b></td>
                                                      <td>{{ $student_info->father_name }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:20%;"><b>Mother's Name</b></td>
                                                      <td>{{ $student_info->mother_name }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:20%;"><b>Contact Number</b></td>
                                                      <td>{{ $student_info->contact_number }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:20%;"><b>Address</b></td>
                                                      <td>{{ $student_info->address }}</td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td style="width:20%;" class="category"><strong>FAMILY DOCTOR</strong></td>
                                      <td>
                                          <table class="table no-border no-strip skills">
                                              <tbody class="no-border-x no-border-y">
                                                  <tr>
                                                      <td style="width:20%;"><b>Doctor's Name</b></td>
                                                      <td>{{ $student_info->family_doctor }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:20%;"><b>Doctor's Contact Number</b></td>
                                                      <td>{{ $student_info->doctor_number }}</td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="category"><strong>HISTORY</strong></td>
                                      <td>
                                          <p>{{ $student_info->history }}</p>
                                      </td>
                                  </tr>
                                  <!-- <tr>
                                      <td class="category"><strong>SOCIAL</strong></td>
                                      <td>
                                          <button type="button" class="btn btn-default btn-flat btn-facebook bg"><i class="fa fa-facebook"></i><span>Facebook</span></button>
                                          <button type="button" class="btn btn-default btn-flat btn-twitter bg"><i class="fa fa-twitter"></i><span>Twitter</span></button>
                                          <button type="button" class="btn btn-default btn-flat btn-google-plus bg"><i class="fa fa-google-plus"></i><span>Google+</span></button>
                                      </td>
                                  </tr> -->
                              </tbody>
                          </table>
                      </div>
                      <div id="disease" class="tab-pane cont">
                          <h3 class="widget-title">Diseases Found During Checkup</h3>
                          <div class="row friends-list">
                              @foreach($diseases as $disese)
                              <div class="col-xs-6 col-md-4">
                                  <div class="friend-widget"><img src="{{ asset('assets/img/medical.jpg') }}">
                                      <h4>{{ ucfirst($disese->subDiseaseName) }}</h4>
                                      <p>{{ ucfirst($disese->diseasesName) }}</p>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                          <p></p>
                      </div>
                      <div id="findings" class="tab-pane">
                        <h3 class="widget-title">Findings</h3>
                        @if(count($diseases))
                         @foreach($diseases as $k => $v)
                         <div class="friend-widget">
                              <h4>{{ ucfirst($v->description) }}</h4>
                          </div>
                         @endforeach   
                         @else
                          No Findings Found
                         @endif
                          <div class="md-overlay"></div>
                      </div>
                  </div>
              </div>
              <div class="block-transparent">


                  <div class="header">
                      <h4>Checkup Records</h4></div>
                  <ul class="timelines">
                    @if(count($all_checkups))
                    @foreach($all_checkups as $key => $h)
                      <li><span class="date"><b>{{ date('d-m-Y', strtotime($h->checkup_date)) }}</b> Height : {{$h->height}} CM Weight : {{$h->weight}} kilo grams</span>
                        @if($h->remarks)
                        <div class="content">
                          @foreach($h->checkup_disease as $checkup_disease)
                            <strong> Organ System  </strong> <b>{{ $checkup_disease->sub_disease->disease['name'] }}</b>
                            <strong> Disease  </strong> <b>{{ $checkup_disease->sub_disease['name'] }}</b>
                          @endforeach
                          <h6> <strong>Findings/Remarks</strong>  <b>{{ $h->remarks }}</b></h6>

                        </div>
                        @endif
                      </li>
                    @endforeach
                    @else
                      <h5>No Checkup history were found ! </h5>

                    @endif
                      
                  </ul>
              </div>
          </div>
          <div class="col-xs-4 side-right">
              
              <div class="block-transparent">
                  <div class="header">
                      
                      <div class="alert alert-success alert-white rounded">
                        <div class="icon"><i class="fa fa-stethoscope"></i></div><h4>Vaccinations</h4>
                      </div>
                    </div>
                      @if(count($vaccinations))
                      <div class="list-group todo list-widget">
                      @foreach($vaccinations as $k => $v)
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> {{ $v->vaccine['name'] }}
                      </span> {{ $v->vaccine['dose_number'] }} Dose </li>
                      @endforeach
                      </div>
                      @else
                      <h6>No Vaccinations Found</h6>
                      @endif
              </div>


              </div>

              <!-- <div class="block-transparent">
                    <div id="container" style="min-width: 310px; min-height: 300px; max-width: 1200px; margin: 0 auto"></div> -->
          </div>

          <div class="row printrow">
              <div class="col-md-8"></div>
              <div class="col-md-4"><buttn type='button' class="btn btn-success" onclick='printDiv();'><i class="fa fa-print" aria-hidden="true"></i> Print</buttn></div>
          </div>
      </div>
      
  </div>
</div>


@stop



@section('page_scripts')

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
        text: 'Disease Percentage section/class/school wise'
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
        name: 'Disease',
        data: [
            { name: 'Corneal opacity ', y: 56.33 },
            {
                name: 'Ref error/Dim vision',
                y: 24.03,
                sliced: true,
                selected: true
            },
            { name: 'Ptosis', y: 10.38 },
            { name: 'Poor growth', y: 4.77 }, { name: 'Opera', y: 0.91 },
            { name: 'Fungal Infection/Ring Worm', y: 0.2 }
        ]
    }]
});



function printDiv() 
{

  var divToPrint=document.getElementById('pcont');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}
</script>
@stop