<div class="container-fluid">
   <div class="navbar-header"><button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button><a href="{{ route('admin.home') }}" class="navbar-brand"><span>Project-Child</span></a></div>
   <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
         <li class="active"><a href="{{ route('admin.home') }}">Home</a></li>
         <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Entries <b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li class="dropdown-submenu">
                  <a href="#">Student</a>
                  <ul class="dropdown-menu">
                     <li><a href="{{ route('student.create')}}">Add</a></li>
                     <li><a href="{{ route('student.index')}}">View</a></li>
                  </ul>
               </li>

               <li class="dropdown-submenu">
                  <a href="#">School</a>
                  <ul class="dropdown-menu">
                     <li><a href="{{ route('school.create')}}">Add</a></li>
                     <li><a href="#">View</a></li>
                  </ul>
               </li>

               <li class="dropdown-submenu">
                  <a href="#">Disease</a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Add</a></li>
                     <li><a href="#">View</a></li>
                  </ul>
               </li>

               <li class="dropdown-submenu">
                  <a href="#">Sub Disease</a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Add</a></li>
                     <li><a href="#">View</a></li>
                  </ul>
               </li>

               <li class="dropdown-submenu">
                  <a href="#">Block</a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Add</a></li>
                     <li><a href="#">View</a></li>
                  </ul>
               </li>

               <li class="dropdown-submenu">
                  <a href="#">District</a>
                  <ul class="dropdown-menu">
                     <li><a href="#">Add</a></li>
                     <li><a href="#">View</a></li>
                  </ul>
               </li>
               
            </ul>
         </li>
         <!-- <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Large menu <b class="caret"></b></a>
            <ul class="dropdown-menu col-menu-2">
               <li class="col-sm-6 no-padding">
                  <ul>
                     <li class="dropdown-header"><i class="fa fa-group"></i>Users</li>
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Another action</a></li>
                     <li><a href="#">Something else here</a></li>
                     <li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>
                     <li><a href="#">Action</a></li>
                     <li><a href="#">Another action</a></li>
                     <li><a href="#">Something else here</a></li>
                  </ul>
               </li>
               <li class="col-sm-6 no-padding">
                  <ul>
                     <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
                     <li><a href="#">New sale</a></li>
                     <li><a href="#">Register a product</a></li>
                     <li><a href="#">Register a client</a></li>
                     <li><a href="#">Month sales</a></li>
                     <li><a href="#">Delivered orders</a></li>
                  </ul>
               </li>
            </ul>
         </li> -->
      </ul>
      <ul class="nav navbar-nav navbar-right user-nav">
         <li class="dropdown profile_menu">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span>ADMIN</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li class="divider"></li>
               <li><a href="{{ route('admin.logout') }}">Sign Out</a></li>
            </ul>
         </li>
      </ul>
      
   </div>
</div>