  <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
       <!-- <img src="" alt="cityadmin" style="width: 48px; border-style: groove; border-radius: 50%;"> 
          <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 13px;">{{$cityadmin->cityadmin_name}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('cityadmin-index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="{{route('notificationCA1')}}">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Send Notification</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading 
      <div class="sidebar-heading">
        
     </div>
       <li class="nav-item">
        <a class="nav-link" href="{{route('category')}}">
          <i class="fas fa-fw fa-cube"></i>
          <span>Categories</span></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('subcat')}}">
          <i class="fas fa-fw fa-cubes"></i>
          <span>Sub Categories</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('product-cityadmin')}}">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Products</span></a>
      </li>
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder-open"></i>
          <span>Order/Incentive</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('today_orders')}}">Today Orders</a>
            <a class="collapse-item" href="{{route('next_day_orders')}}">Next Day Orders</a>
            <a class="collapse-item" href="{{route('completed')}}">Completed Orders</a>
            <a class="collapse-item" href="{{route('incentive')}}">Incentive</a>
          </div>
        </div>
      </li>
          <!--  <li class="nav-item">
        <a class="nav-link" href="{{route('homecate')}}">
          <i class="fas fa-fw fa-file"></i>
          <span>Home Category Group</span></a>
     </li>
     <li class="nav-item">
        <a class="nav-link" href="{{route('banner')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Banner Management</span></a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="{{route('area')}}">
          <i class="fas fa-fw fa-map"></i>
          <span>Area Management</span></a>
      </li>
       <!-- Nav Item - Utilities Collapse Menu -->
      
             <!-- Nav Item - Pages Collapse Menu -->
    
   <!--   <li class="nav-item">
        <a class="nav-link" href="{{route('inventory')}}">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Financial Report</span></a>
      </li> -->
    


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
