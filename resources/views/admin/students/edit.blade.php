@extends('layouts.admin')

@section('page_title') Edit Student @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Edit Student</h3>
            </div>
            <div class="content">
			    {!! Form::model($student, array('route' => ['student.update', Crypt::encrypt($student->id)], 'id' => 'student_update', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.students._create')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Update', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection