@extends('layouts.admin')

@section('page_title') Checkup Added Successfully @stop

@section('main_content')
<div class="container-fluid">
    <div class="cl-mcont">
       <div class="block-flat">
            <div class="header">
               <h3>Checkup Added Successfully !</h3>
            </div>
            
            <div class="content">
                <a href="{{ route('checkup.add') }}" class="btn btn-info">Add New Checkup</a>

                <a href="{{ route('admin.home') }}" class="btn btn-success">Go to Dashboard</a>
            </div>

		</div>
	</div>
</div>
@endsection
