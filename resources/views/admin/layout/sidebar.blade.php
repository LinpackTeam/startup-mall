 
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        <img src="{{url($admin->admin_image)}}" alt="admin" style="width: 48px; border-style: groove; border-radius: 50%;"> 
          
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: 13px;">{{$admin->admin_name}}</div>
      </a>

  
      <hr class="sidebar-divider my-0">

      
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin-index')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('notification1')}}">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Send Notification</span></a>
      </li>
	        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#startupcollpase" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Startup</span>
        </a>
        <div id="startupcollpase" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('registered')}}">Registered</a>
            <a class="collapse-item" href="{{route('issue_in_verification')}}">Issue in Verification</a>
            <a class="collapse-item" href="{{route('verification_success')}}">Verification Success</a>
            <a class="collapse-item" href="{{route('product_added')}}">Product Added</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-bullseye"></i>
          <span>Product</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('admin_pending_product')}}">Pending Product</a>
            <a class="collapse-item" href="{{route('admin_approved_product')}}">Approved Product</a>
            
          </div>
        </div>
      </li>
      
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{route('edit-admin',[$admin->id])}}">Edit Profile</a>
            <a class="collapse-item" href="{{route('edit_sms_api')}}">SMS API Key</a>
            <a class="collapse-item" href="{{route('edit-logo')}}">Edit App Logo</a>
            <a class="collapse-item" href="{{route('paymentvia')}}">Payment Mode</a>
            
          </div>
        </div>
      </li>
      
      <hr class="sidebar-divider">

     
      <div class="sidebar-heading">
        
      </div>

     
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('city')}}">
          <i class="fas fa-fw fa-university"></i>
          <span>City</span></a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="{{route('cityadmin')}}">
          <i class="fas fa-fw fa-user"></i>
          <span>Start-Up</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('alluser')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>User Management</span></a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="{{route('cancel_reason')}}">
          <i class="fas fa-fw fa-window-close"></i>
          <span>Cancelling Reasons</span></a>
      </li>
      
      </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('faq')}}">
          <i class="fas fa-fw fa-cubes"></i>
          <span>FAQs</span></a>
      </li>
      
      <hr class="sidebar-divider">

    
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
 
