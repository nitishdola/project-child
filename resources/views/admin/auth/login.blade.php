@extends('layouts.auth')
@section('loginContent')
<div>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
    {{ csrf_field() }}
        <div class="content">
            <h4 class="title">Admin Login Access</h4>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="username" name="username" type="text" placeholder="Username" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="foot">
            <!-- <button data-dismiss="modal" type="button" class="btn btn-default">Register</button> -->
            <button type="submit" class="btn btn-primary">Log me in</button>
        </div>
        <hr>
        <div class="foot">
            <!-- <button data-dismiss="modal" type="button" class="btn btn-default">Register</button> -->
            <div class="col-md-5">
            <a class="btn btn-warning" href="{{ url('student/login') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Login as Student</a>
            </div>

            <div class="col-md-7">
            <a href="{{ url('/school-admin/login') }}" class="btn btn-success"><i class="fa fa-university" aria-hidden="true"></i> Login as School Administrator</a>
            </div>
        </div>
    </form>
</div>
@endsection