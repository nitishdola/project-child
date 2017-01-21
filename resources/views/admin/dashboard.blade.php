@extends('layouts.admin')

@section('main_content')
<div id="pcont" class="container-fluid">
    <div class="cl-mcont">
       <div class="stats_bar">
          <div class="col-md-12">
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/block.png') }}">
                <span id="total_clients">170</span>
                <h2>BLOCKS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>

          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/school.png') }}">
                <span id="total_clientes">170</span>
                <h2>SCHOOLS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>

          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/students.png') }}">
                <span id="total_clientes">170</span>
                <h2>STUDENTS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
        </div>

        <div class="row">
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/disease.png') }}">
                <span id="total_clients">170</span>
                <h2>DISEASES</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/sub-disease.png') }}">
                <span id="total_clients">170</span>
                <h2>SUB-DISEASES</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/boy.png') }}">
                <span id="total_clientes">170</span>
                <h2>BOYS</h2>
                
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
          <div data-step="2" data-intro="&lt;strong&gt;Beautiful Elements&lt;/strong&gt; &lt;br/&gt; If you are looking for a different UI, this is for you!." class="butpro butstyle">
             <div class="sub">
                <img src="{{ asset('assets/img/icons/girl.png') }}">
                <span id="total_clientes">170</span>
                <h2>GIRLS</h2>
             </div>
             <div class="stat">
                <span class="spk1">
                   <canvas style="display: inline-block; width: 74px; height: 16px; vertical-align: top;" width="74" height="16"></canvas>
                </span>
             </div>
          </div>
        </div>
       </div>


      <!--Reports-->
      <div class="row dash-cols">
          <div class="col-sm-12 col-md-12 col-lg-10">
             <div class="widget-block">
                <div class="white-box padding">
                   <div class="row info text-shadow">
                      <div class="col-xs-12">
                         <h3>Reports</h3>
                      </div>
                      {!! Form::open(array('route' => 'reports.data', 'id' => 'reports.data', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
                        <div class="col-xs-6">
                           <div id="com2_stats">
                              <div class="form-group">
                                    {!! Form::label('school_id', 'Select School', array('class' => 'col-sm-3 control-label')) !!}
                                   <div class="col-sm-9">
                                      {!! Form::select('school_id', $schools, null, ['class' => 'select2', 'id' => 'school_id', 'placeholder' => 'Seelct School' ]) !!}
                                   </div>
                                </div>
                                <div class="form-group">
                                   {!! Form::label('class', 'Select Class', array('class' => 'col-sm-3 control-label')) !!}
                                   <div class="col-sm-9">
                                      {!! Form::text('class', null, ['class' => 'form-control', 'id' => 'class', 'placeholder' => 'Enter Class' ]) !!}
                                   </div>
                                </div>

                                <div class="form-group">
                                   {!! Form::label('class', 'Select Gender', array('class' => 'col-sm-3 control-label')) !!}
                                   <div class="col-sm-9">
                                      <div class="radio"><label><input type="radio" value="male"  name="sex" class="icheck"> Male</label></div>
                                      <div class="radio"><label><input type="radio" name="sex" value="female" class="icheck"> Female</label></div>
                                   </div>
                                </div>
                                
                           </div>
                        </div>


                        <div class="col-xs-6">
                           <div id="com2_stats">
                              <div class="form-group">
                                    {!! Form::label('disease_id', 'Organ System', array('class' => 'col-sm-3 control-label')) !!}
                                   <div class="col-sm-9">
                                      {!! Form::select('disease_id', $diseases, null, ['class' => 'form-control', 'id' => 'disease_id', 'placeholder' => 'Seelct Disease' ]) !!}
                                   </div>
                              </div>

                              <div class="form-group">
                                    {!! Form::label('sub_disease_id', 'Sub Disease', array('class' => 'col-sm-3 control-label')) !!}
                                   <div class="col-sm-9">
                                      <select name="sub_disease_id" id="sub_disease_id" class="form-control"></select>
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
             </div>
          </div>
      </div>

       <!-- 
      <div class="row dash-cols">
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="widget-block">
                <div class="white-box padding">
                   <div class="row info">
                      <div>
                         <h3>Your Goals</h3>
                      </div>
                      <div>
                         <div id="com_stats" style="height:98px;"></div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="widget-block">
                <div class="white-box padding">
                   <div class="row info text-shadow">
                      <div class="col-xs-12">
                         <h3>Comments</h3>
                      </div>
                      <div class="col-xs-12">
                         <div id="com2_stats" style="height:98px;"></div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="widget-block">
                <div class="white-box">
                   <div class="fact-data">
                      <div data-bar-color="#FD9C35" data-track-color="#EFEFEF" data-percent="45" class="epie-chart"><span>0%</span></div>
                   </div>
                   <div class="fact-data no-padding text-shadow">
                      <h3>Users sales</h3>
                      <h2>4,522</h2>
                      <p>Monthly sales from users.</p>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="row dash-cols">
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="block">
                <div class="header">
                   <h2><i class="fa fa-comment"></i>Comments</h2>
                </div>
                <div class="content no-padding">
                   <div class="fact-data text-center">
                      <h3>Positive</h3>
                      <h2>60%</h2>
                   </div>
                   <div class="fact-data text-center">
                      <h3>Negative</h3>
                      <h2>40%</h2>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="block">
                <div class="header">
                   <h2><i class="fa fa-bug"></i>Tickets</h2>
                </div>
                <div class="content no-padding">
                   <div class="fact-data text-center">
                      <h3>Frequency</h3>
                      <h2>53%</h2>
                   </div>
                   <div class="fact-data text-center">
                      <h3>Pending</h3>
                      <h2>13</h2>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
             <div class="block">
                <div class="header">
                   <h2><i class="fa fa-comment"></i>Comments</h2>
                </div>
                <div class="content no-padding">
                   <div class="fact-data text-center">
                      <h3>Positive</h3>
                      <h2>60%</h2>
                   </div>
                   <div class="fact-data text-center">
                      <h3>Negative</h3>
                      <h2>40%</h2>
                   </div>
                </div>
             </div>
          </div>
       </div> -->
    </div>
 </div>
@endsection

@section('page_scripts')
<script>
  $('#disease_id').change(function() {
    $('#sub_disease_id').empty();
    $disease_id = $(this).val();

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
        var html = '';
        html += '<option value="">Select Sub Disease</option>';
        $.each(jsonObject, function(key,val){
            html += '<option value="'+val.id+'">'+val.name+'</option>';
        });
        $('#sub_disease_id').html(html);
      }
      
    }
  });
</script>
@stop