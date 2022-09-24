<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header nav-bg">
                <div class="dropdown profile-element">
                <p class="text-logo-1 text-white text-uppercase"> KT ADMIN</p>
                <p class="text-white">{{Session::get('full_name')}} </p>
                   
                     <a data-toggle="dropdown" class="link-hover" >
                        <span class="text-font_2">
                           <span class="block m-t-xs heading-padding">
                             <strong class="font-bold">{{Session::get('email')}} </strong><br>
                            </span>
						            </span>
                      </a>
                  </div>
                  <div class="logo-element">
                 </div>
              </li>
               <li class="">
                 <a href="{{ route('kt-admincreate')}}"><i class="fa fa-plus nav_label"></i> <span class="nav-label ">Create BlogAdmin</span></a>
                </li>
                <li class=" ">
                  <a href="{{ route('kt-adminblog-admin')}}"><i class="fa fa-newspaper-o"></i> <span class="nav-label">View BlogAdmin</span></a>
                </li>
               
         </ul>
    </div>
</nav>


