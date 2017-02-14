@extends('layouts.admin')

@section('page_title') Add a Student @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Search Students</h3>

               {!! Form::open(array('route' => 'student.index', 'id' => 'student.index', 'class' => 'form-horizontal row-border', 'method' => 'get')) !!}
               <div id="com2_stats">
                  	<div class="form-group">
                       {!! Form::label('nm', 'Name', array('class' => 'col-sm-1 control-label')) !!}
                       <div class="col-sm-3">
                          {!! Form::text('name', $name , ['class' => 'form-control', 'id' => 'class', 'placeholder' => 'All' ]) !!}
                       </div>

                       {!! Form::label('regNo', 'Reg No', array('class' => 'col-sm-1 control-label')) !!}
                       <div class="col-sm-3">
                          {!! Form::text('registration_number', $registration_number, ['class' => 'form-control', 'id' => 'class', 'placeholder' => 'All' ]) !!}
                       </div>

                       {!! Form::label('school', 'School', array('class' => 'col-sm-1 control-label')) !!}
                       <div class="col-sm-3">
                          {!! Form::select('school_id', $schools, $school_id, ['class' => 'select2', 'id' => 'schools', 'placeholder' => 'All School' ]) !!}
                       </div>
                    </div>

                    <div class="form-group">
                    	<div class="col-sm-1"></div>
                       	<div class="col-sm-3">
                       		<button type="submit" class="btn btn-success">Search</button>
                       </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
        <div class="content">
            <div class="col-md-12">
			    <div class="block-flat">
			    	<div class="header"><h3>Students</h3></div>
			    	@if(count($results))
					<?php $count = 1; ?>
			    	<table class="table no-border">
                        <thead class="no-border">
                            <tr>
                            	<th>#</th>
                                <th style="width: 10%">Name</th>
                                <th>Registration No</th>
                                <th style="width: 10%">Father's Name</th>
                                <th style="width: 10%">School</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th style="width: 15%">Address</th>
                                <th style="width: 10%">Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="no-border-x">
                        	@foreach( $results as $k => $v)
                            <tr>
                                <td> {{ (($results->currentPage() - 1 ) * $results->perPage() ) + $count + $k }} </td>
                                <td style="width: 10%">{{ $v->name }}</td>
                                <td>{{ $v->registration_number }}</td>
                                <td style="width: 10%">{{ $v->father_name }}</td>
                                <td style="width: 10%">{{ $v->school['name'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($v->dob)) }}</td>
                                <td>{{ ucfirst($v->sex) }}</td>
                                <td style="width: 15%">{{ $v->address }}</td>
                                <td style="width: 10%">{{ $v->contact_number }}</td>
                                <td>
                                	<a href="{{ route('student.info', Crypt::encrypt($v->id)) }}" class="btn btn-info btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> Info</a> 

                                	<a href="{{ route('student.edit', Crypt::encrypt($v->id)) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                                	<a onclick="return confirm('Are you sure to delete ?')" href="{{ route('student.disable', Crypt::encrypt($v->id)) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
			            {!! $results->render() !!}
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
</div>
@endsection