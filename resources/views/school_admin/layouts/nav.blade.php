<div class="container-fluid">
   <div class="navbar-header"><button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button><a href="{{ route('school.admin.home') }}" class="navbar-brand"><span>Project-Child</span></a></div>
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="{{ route('school.admin.home') }}">Home</a></li>
         
            
         <li><a href="{{ route('school_admin.view_all_students')}}">View Students</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right user-nav">
         <li class="dropdown profile_menu">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>{{ getCurrentSchoolName() }}</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li class="divider"></li>
               <li><a href="{{ route('school_admin.logout') }}">Sign Out</a></li>
            </ul>
         </li>
      </ul>
      
   </div>
</div>