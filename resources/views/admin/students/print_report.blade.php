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
                              <h5><i class="fa fa-calendar" aria-hidden="true"></i> DOB {{ date('d/m/Y', strtotime($student_info->dob)) }}</h5>
                          </div>
                      </div>

                      <div class="col-xs-5" style="text-align: left;">
                        <h5><i class="fa fa-genderless" aria-hidden="true"></i> Blood Grop {{ $student_info->blood_group['name'] }}</h5>
                        
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

                        <h5> <button type="button" class="btn btn-default btn-flat bg {{ $bmi_class }}"><span>BMI {{ number_format((float)$student_bmi, 2, '.', '') }}</span></button> </h5>

                        

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
                      <li><a data-toggle="tab" href="#disease">Diseases</a></li>
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
                          @if(count($findings))
                         @foreach($findings as $k => $v)
                         <div class="friend-widget">
                              <h4>{{ ucfirst($disese->finding) }}</h4>
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
                      <h4>Checkup History</h4></div>
                  <ul class="timeline">
                    @if(count($all_checkups))
                    @foreach($all_checkups as $checkup)
                      <li><i class="fa fa-snowflake-o" aria-hidden="true"></i><span class="date">{{ date('d M y', strtotime($checkup->checkup_date)) }} </span>
                          
                          @if($checkup->findings)
                          <div class="content">
                            @foreach($checkup->findings as $finding)
                            <h6> <strong>Findings</strong> </h6>
                            <p> {{ $finding->finding }} </p>
                            @endforeach
                          </div>
                          @endif

                          @if($checkup->checkup_disease)
                          <div class="content">
                            @foreach($checkup->checkup_disease as $disease)
                            <h6> <strong>Diseases</strong> </h6>
                            <p> {{ $disease->sub_disease['name'] }} </p>
                            @endforeach
                          </div>
                          @endif

                      </li>
                    @endforeach
                    @else
                      <div class="alert alert-info">
                      <h4>No Previous Checkups Found !</h4>
                      </div>
                    @endif
                      
                  </ul>
              </div>
          </div>
          <div class="col-xs-4 side-right">
              
              <div class="block-transparent">
                  <div class="header">
                      <h4>Vaccinations</h4></div>
                  <div class="list-group todo list-widget">
                      @foreach($vaccinations as $k => $v)
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> {{ $v->vaccine['name'] }}
                      </span> {{ $v->vaccine['dose_number'] }} Dose </li>
                      @endforeach
                  </div>
              </div>
              <div class="block-transparent">
                  <div class="header dark">
                      <h4>Boosters</h4></div>
                  <div class="list-group todo list-widget">
                      @foreach($vaccinations as $k => $v)
                      <li href="#" class="list-group-item"><span class="date" {{ $v->vaccine['name'] }} </li>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
