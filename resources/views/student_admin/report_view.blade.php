@extends('layouts.student_admin')

@section('page_css')
<style>
@media print {
  .fa-stethoscope, #print-button {
    display: none;
  }
  .checkup-details {
    margin-top:140px;
  }
}
</style>

<style type="text/css">
  .checkup-details {
    margin-top:140px;
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
                          <div class="avatar">
                            <img src="{{ asset('uploads/checkup_images/'.$last_checkup->photo_path) }}" class="profile-avatar">
                          </div>
                      </div>
                      <div class="col-xs-7">
                          <div class="personal">
                              <h3 class="name">{{ $student_info->first_name }} {{ $student_info->middle_name }} {{ $student_info->last_name }}</h3>
                              <p class="description">
                              <strong> {{ $student_info->school['name'] }} </strong>  , <strong> Class </strong> <b>{{ $last_checkup->class }}</b>   <strong>Sec </strong> <b>{{ $last_checkup->section }}</b>
                              </p>
                              
                               <p class="description">
                              <strong> Project Child Reg No </strong>  <b>{{ $student_info->registration_number }}</b>
                              </p>

                              <p>
                              <strong> School Reg No </strong>  <b>{{ $student_info->school_registration_number }}</b>

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

                      <div class="col-xs-3">
                          <table class="table no-border no-strip skills">
                              <tbody class="no-border-x no-border-y">
                                  <tr>
                                      <td style="width:60%;"><strong>Blood Group</strong></td>
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
                                          <b>{{ $last_checkup->height }} cm</b>
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
          <div class="col-xs-8">
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
                                                      <td style="width:30%;"><b>Father's Name</b></td>
                                                      <td>{{ $student_info->father_name }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:30%;"><b>Mother's Name</b></td>
                                                      <td>{{ $student_info->mother_name }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:30%;"><b>Contact Number</b></td>
                                                      <td>{{ $student_info->contact_number }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:30%;"><b>Address</b></td>
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
                                                      <td style="width:30%;"><b>Doctor's Name</b></td>
                                                      <td>{{ $student_info->family_doctor }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td style="width:30%;"><b>Contact Number</b></td>
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
          </div>
          <div class="col-xs-4 side-right">
              <div class="block-flat bars-widget">
                  <div class="spk4 pull-right spk-widget"></div>
                  <h4>Vaccinations</h4>
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

              <!-- <div class="block widget-notes">
                  <div class="header dark">
                      <h4>Notes</h4></div>
                  <div class="content">
                      <div contenteditable="true" class="paper">Send e-mails.
                          <br><s>meeting at 4 pm.</s>
                          <br><s>Buy some coffee.</s>
                          <br> Feed my dog.</div>
                  </div>
              </div -->
          </div>
      </div>

      <div class="row checkup-details">
        <div class="block-transparent">
            <div class="header">
                <h4>Checkup Details</h4></div>
            <ul class="timeline">
                @if(count($all_checkups))
                @foreach($all_checkups as $key => $h)

                <li>
                    <i class="fa fa-stethoscope red" aria-hidden="true"></i><span class="date">{{ date('d-m-y', strtotime($h->checkup_date)) }}</span>
                    <div class="content" >
                        <p> <strong>Height : </strong> <b>{{$h->height}} cm</b> 
                            <strong> Weight : </strong> <b>{{$h->weight}} kilograms</b>
                        </p>  

                        
                        <div class="disease-found" style="padding:20px 0">
                          @if(count($h->checkup_disease))
                          @foreach($h->checkup_disease as $x => $checkup_disease)
                            <div class="clearfix"></div>
                            <div class="disease-data" style="padding-top: 20px;">
                              <p> 
                                <strong> <span class="col-xs-3"> <i class="fa fa-hand-o-right" aria-hidden="true"></i>  Organ System  </span></strong> 
                                <span class="col-xs-3"><b>{{ $checkup_disease->disease['name'] }}</b></span>
                                <strong> Disease  </strong> : <b>{{ $checkup_disease->sub_disease['name'] }}</b>
                              </p> 
                              <p>
                                <strong> <span class="col-xs-3"> Comments : </span></strong> 
                                <span class="col-xs-9"><b>{{ $checkup_disease->description }}</b></span>
                              </p>
                            </div>
                          
                          
                          @endforeach
                          <hr>
                          @endif
                          <p><strong>Findings/Remarks</strong>  <b>{{ $h->remarks }}</b>
                          </p>
                        </div>
                    </div>
                </li>
                
                @endforeach
                @else
                  <h5>No Checkup history were found ! </h5>
                @endif
            </ul>
        </div>
      </div>

      <div class="row" id="print-button">
        <div class="col-md-4 col-md-offset-4">
          <button type="button" class="btn btn-warning" onclick='printDiv("pcont");'><i class="fa fa-print" aria-hidden="true"></i> PRINT</button>
        </div>
      </div>
  </div> 

</div>


@stop


@section('page_scripts')
<script>

function printDiv(elem)
{
    var printContents = document.getElementById(elem).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>