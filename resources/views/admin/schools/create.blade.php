@extends('layouts.admin')

@section('page_title') Add a School @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Add a School</h3>
            </div>
            <div class="content">
			    {!! Form::open(array('route' => 'school.store', 'id' => 'school.store', 'class' => 'form-horizontal row-border')) !!}
			        @include('admin.schools._create')
			        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
			        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
			    {!!form::close()!!}
			</div>
		</div>
	</div>
</div>
@endsection