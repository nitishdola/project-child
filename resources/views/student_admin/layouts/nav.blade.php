<div class="container-fluid">
   <div class="navbar-header"><button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button><a href="{{ route('student.admin.home') }}" class="navbar-brand"><span>Project-Child</span></a></div>
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="{{ route('student.admin.home') }}">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right user-nav">
         <li class="dropdown profile_menu">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>{{ getCurrentStudentName() }}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
            
               <li class="divider"></li>
               <li><a href="{{ route('student.change_password') }}">Change Password</a></li>
               <li><a href="{{ route('student.logout') }}">Sign Out</a></li>
            </ul>
         </li>
      </ul>
      
   </div>
</div>