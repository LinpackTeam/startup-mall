   <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         <div class="sidebar-brand-text" align="center" style="font-weight:bold; font-size: 2Opx;margin-left: 36%;">S T A R T U P  &nbsp; &nbsp;  A D M I N &nbsp; &nbsp;P A N E L</div>
          <!-- Topbar Navbar -->
          
         
          <ul class="navbar-nav ml-auto">

            

  <!--<a href="{{route('dispatch_panel')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" align="right" style="padding: 23px;"><i class="fas fa-download fa-sm text-white-50"></i> Dispatch Panel</a>-->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$cityadmin->cityadmin_name}}</span>
            <!--    <img class="img-profile rounded-circle" src="">-->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
				<a class="dropdown-item"  href="{{route('edit-cityadmin')}}">
                  <i class="fas fa-user fa-sm fa-fw  mr-2 text-gray-400"></i>
                   Edit Profile
                </a>
				<div class="dropdown-divider"></div>
                <a class="dropdown-item"  href="{{route('cityadmin-logout')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
				
              </div>
            </li>

          </ul>

        </nav> 