@extends('layouts.admin')
@section('title') Add a School @stop
@section('pageTitle') Add a School @stop

@section('content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="stats_bar">
       		<div class="row">
				<div class="col-lg-12">
					<div class="widget-container fluid-height clearfix">
						<div class="widget-content padded">
						    <div class="col-xs-8">
							    {!! Form::open(array('route' => 'department.store', 'id' => 'department.store', 'class' => 'form-horizontal row-border')) !!}
							        @include('admin.departments._form')
							        {!! Form::label('', '', array('class' => 'col-md-3 control-label')) !!}
							        {!! Form:: submit('Submit', ['class' => 'btn btn-success']) !!}
							    {!!form::close()!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection