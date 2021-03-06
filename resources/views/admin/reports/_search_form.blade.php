{!! Form::open(array('route' => 'reports.data', 'id' => 'reports.data', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
    <div class="col-xs-6">
       <div id="com2_stats">

          <div class="form-group">
             {!! Form::label('history', '', array('class' => 'col-sm-3 control-label')) !!}
             <div class="col-sm-9">
               {!! Form::text('history', $history, ['class' => ' form-control', 'id' => 'history', 'placeholder' => 'Enter History' ]) !!}
             </div>
          </div>

          <div class="form-group">
                {!! Form::label('school_id', 'Select School', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  {!! Form::select('school_id', $schools, $school_id, ['class' => 'select2', 'id' => 'school_id', 'placeholder' => 'Seelct School' ]) !!}
               </div>
            </div>

            <div class="form-group" id="schoolRegNo" style="display: none;">
               {!! Form::label('school_registration_number', 'School Reg No', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                 {!! Form::text('school_registration_number', null, ['class' => ' form-control', 'id' => 'class', 'placeholder' => 'All School Reg Number' ]) !!}
               </div>
            </div>

            <div class="form-group">
               {!! Form::label('class', 'Select Class', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  {!! Form::select('class', $classes, $class, ['class' => 'select2other', 'id' => 'studentclass', 'placeholder' => 'Select Class' ]) !!}
               </div>
            </div>

            <div class="form-group section-deps" id="sectionHolder">
               {!! Form::label('section', 'Select Section', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  <select name="section" id="section" class="form-control"></select>
               </div>
            </div>

            <div class="form-group section-deps" id="semesterHolder">
               {!! Form::label('semester', 'Select Semester', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  <select name="semester" id="semester" class="form-control"></select>
               </div>
            </div>

            <div class="form-group section-deps" id="branchHolder">
               {!! Form::label('branch', 'Select Branch', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  <select name="branch" id="branch" class="form-control"></select>
               </div>
            </div>

            <div class="form-group section-deps" id="streamHolder">
               {!! Form::label('stream', 'Select Stream', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  <select name="stream" id="stream" class="form-control"></select>
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
                  {!! Form::select('checkup_year', $checkup_years, null, ['class' => 'select2other', 'id' => 'checkup_years', 'placeholder' => 'All Checkups' ]) !!}
                </select>
             </div>
          </div>

          <div class="form-group">
               {!! Form::label('registration_number', 'Projectchild Reg No', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                 {!! Form::text('registration_number', $registration_number, ['class' => ' form-control', 'id' => 'class', 'placeholder' => 'Select Reg Number' ]) !!}
               </div>
            </div>

            <!-- <div class="form-group">
               {!! Form::label('class', 'Select Gender', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                  <div class="radio"><label><input type="radio" @if($sex == 'male') checked="checked" @endif value="male"  name="sex" class="icheck"> Male</label></div>
                          <div class="radio"><label><input type="radio" @if($sex == 'female') checked="checked" @endif name="sex" value="female" class="icheck"> Female</label></div>
               </div>
            </div> -->

             <div class="form-group">
               {!! Form::label('first_name', '', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                 {!! Form::text('first_name', $first_name, ['class' => ' form-control', 'id' => 'first_name', 'placeholder' => 'Enter First Name' ]) !!}
               </div>
            </div>

           <!--  <div class="form-group">
               {!! Form::label('last_name', '', array('class' => 'col-sm-3 control-label')) !!}
               <div class="col-sm-9">
                 {!! Form::text('last_name', $last_name, ['class' => ' form-control', 'id' => 'last_name', 'placeholder' => 'Enter Last Name' ]) !!}
               </div>
            </div> -->

       </div>
    </div>

    <div class="form-group">
       <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-primary">View</button></div>
    </div>
  {!! Form::close() !!}