@extends('layouts.admin')
@section('main_content')
<div id="pcont" class="container-fluid">
  <div class="cl-mcont">
      <div class="row">
          <div class="col-sm-12">
              <div class="block-flat profile-info">
                  <div class="row">
                      <div class="col-sm-2">
                          <div class="avatar"><img src="assets/img/av.jpg" class="profile-avatar"></div>
                      </div>
                      <div class="col-sm-7">
                          <div class="personal">
                              <h3 class="name">{{ $student_info->first_name }} {{ $student_info->middle_name }} {{ $student_info->last_name }}</h3>
                              <p class="description">
                              <strong> {{ $student_info->school['name'] }} </strong>  , <strong> Class </strong> <b>{{ $last_checkup->class }}</b>   <strong>Sec </strong> <b>{{ $last_checkup->section }}</b>
                              </p>
                              
                               <p class="description">
                              <strong> Registraion Number </strong>  <b>{{ $student_info->registration_number }}</b>
                              </p>

                              <p class="description">
                              <strong> DOB </strong>  <b>{{ date('d/m/Y', strtotime($student_info->dob)) }}</b>
                              </p>
                          </div>
                      </div>
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

                      <div class="col-sm-3">
                          <table class="table no-border no-strip skills">
                              <tbody class="no-border-x no-border-y">
                                  <tr>
                                      <td style="width:45%;"><strong>Blood Group</strong></td>
                                      <td class="vmiddle">
                                          <b>{{ $student_info->blood_group['name'] }}</b>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><strong>Weight</strong></td>
                                      <td class="vmiddle">
                                          <b>{{ $last_checkup->weight }} kg </b>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><strong>Height</strong></td>
                                      <td class="vmiddle">
                                          <b>{{ $last_checkup->height }} centi meters</b>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><strong>BMI</strong></td>
                                      <td class="vmiddle">
                                          <b>{{ number_format((float)$student_bmi, 2, '.', '') }}</b>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-8">
              <div class="tab-container">
                  
                  <div class="tab-content">
                      <div id="home" class="tab-pane active cont">
                          <table class="table no-border no-strip information">
                              <tbody class="no-border-x no-border-y">
                                  <tr>
                                      <td style="width:20%;" class="category"><strong>CONTACT INFO</strong></td>
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
                                      <td class="category"><strong>FAMILY DOCTOR</strong></td>
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
                                      <td class="category"><strong>PAST HISTORY</strong></td>
                                      <td>
                                          <p>{{ $student_info->history }}</p> 
                                      </td>
                                  </tr>

                                  <tr>
                                      <td class="category"><strong>REMARKS</strong></td>
                                      <td>
                                          <p>{{ ucfirst($last_checkup->remarks) }}</p>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="block-transparent">
                  <div class="header">
                      <h4>Checkup Details</h4></div>
                  <ul class="timeline">
                      @if(count($all_checkups))
                      @foreach($all_checkups as $key => $h)

                      <li>
                          <i class="fa fa-stethoscope red" aria-hidden="true"></i><span class="date">{{ date('d-m-y', strtotime($h->checkup_date)) }}</span>
                          <div class="content" style="min-height: 120px;" >
                              <p> <strong>Height : </strong> <b>{{$h->height}}</b> 
                                  <strong>CM Weight : </strong> <b>{{$h->weight}} kilo grams</b>
                              </p>  

                              @if($h->remarks)
                                @foreach($h->checkup_disease as $checkup_disease)
                                <p>
                                  <strong> <span class="col-xs-2">Organ System  </span></strong> 
                                  <span class="col-xs-3"><b>{{ $checkup_disease->disease['name'] }}</b></span>
                                  <strong> Disease  </strong> : <b>{{ $checkup_disease->sub_disease['name'] }}</b>
                                </p>
                                @endforeach
                                <h6> <strong>Findings/Remarks</strong>  <b>{{ $h->remarks }}</b></h6>
                              @endif
                          </div>
                      </li>
                      
                      @endforeach
                      @else
                        <h5>No Checkup history were found ! </h5>
                      @endif
                  </ul>
              </div>
          </div>
          <div class="col-sm-4 side-right">
              <div class="block-flat bars-widget">
                  <div class="spk4 pull-right spk-widget"></div>
                  <h4>Total Sales</h4>
                  <p>Monthly summary</p>
                  <h3>545</h3></div>
              <div class="block-flat bars-widget">
                  <div class="spk5 pull-right spk-widget"></div>
                  <h4>New Visitors</h4>
                  <p>Stat Description</p>
                  <h3>146</h3></div>
              <div class="block-transparent">
                  <div class="header">
                      <h4>Events</h4></div>
                  <div class="list-group todo list-widget">
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 20 Dec</span> Dinner with my family</li>
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 13 Jan</span> Meeting with our partners</li>
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 18 Feb</span> Work in new project</li>
                      <li href="#" class="list-group-item"><span class="date"><i class="fa fa-clock-o"></i> 21 Feb</span> Go to the doctor</li>
                  </div>
              </div>
              <div class="block widget-notes">
                  <div class="header dark">
                      <h4>Notes</h4></div>
                  <div class="content">
                      <div contenteditable="true" class="paper">Send e-mails.
                          <br><s>meeting at 4 pm.</s>
                          <br><s>Buy some coffee.</s>
                          <br> Feed my dog.</div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop