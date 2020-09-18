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
        <a class="nav-link" href="{{route('add-new-startup')}}">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add New Start-up</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('view-startup-support')}}">
          <i class="fas fa-fw fa-cubes"></i>
          <span>All Start-ups</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('pendingbysupport_startup')}}">
          <i class="fas fa-fw fa-exclamation-circle"></i>
          <span>Pending Start-ups</span></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="{{route('interestedstartup')}}">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Interested Start-ups</span></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="{{route('registeredstartup')}}">
          <i class="fas fa-fw fa-check"></i>
          <span>Registered Start-ups</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

