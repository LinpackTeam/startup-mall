  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15"> 
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 13px;"></div>
      </a>

      <!-- Divider -->   
      
      
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
     </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('newstartup')}}">
          <i class="fas fa-fw fa-cubes"></i>
          <span>New Start-ups</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dateallocatedstartup')}}">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Date Allocated Start-ups</span></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="{{route('verifiedstartup')}}">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Verified Start-ups</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
