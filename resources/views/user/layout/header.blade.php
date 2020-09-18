<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <title>Start-up Mall</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">
  <!-- meterilazed css-->
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <!-- Favicons -->
  <link href="{{url('home_images/favicon.png')}}" rel="icon">
  <link href="{{url('home_images/apple-touch-icon.png')}}" rel="apple-touch-icon">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('public/css/css_for_admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">   

 
  
  
  <link href="{{url('public/css/css_for_admin/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{url('public/css/css_for_admin/vendor/aos/aos.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{url('public/css/css_for_admin/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
  	$(document).ready(function() {
  		 var hiddenBox1 = $( ".sub-menu" );
        var hiddenBox2 = $( ".first" );
         var hiddenBox3 = $( ".sec" );
          var hiddenBox4 = $( ".third" );
           var hiddenBox5 = $( ".fourth" );
            var hiddenBox6 = $( ".fifth" );
             var hiddenBox7 = $( ".sixth" );   
  	$( "#icon" ).hover(function( event ) {
  hiddenBox1.slideToggle('linear');

});
    
    
  $( "#cut1" ).click(function( event ) {
  hiddenBox2.hide();
    
});
   $( "#cut2" ).click(function( event ) {
  hiddenBox3.hide();
});
    $( "#cut3" ).click(function( event ) {
  hiddenBox4.hide();
});
     $( "#cut4" ).click(function( event ) {
  hiddenBox5.hide();
});
      $( "#cut5" ).click(function( event ) {
  hiddenBox6.hide();
});
       $( "#cut6" ).click(function( event ) {
  hiddenBox7.hide();

});
      if(hiddenBox1.val()=='')
      {
        var hi="  NO NEW NOTIFICATION";
        hiddenBox1.append(`<li> ${hi}</li>`);
      }       
});
    </script>
      <style type="text/css">
	 

	  
	  .sub-menu li
{
  float:left;
}

	  
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: grey; 
  border-radius: 10px;
}
    #cut1,#cut2,#cut3,#cut4,#cut5,#cut6
    {
      float:right;
      margin-left:60px;
    }

    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
 
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
     .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  bottom: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 100%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
    /* css for Search bar */
    .search form {
  margin-top: 10px;
  background: #fff;
  padding: 6px 10px;
  position: relative;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
  text-align: left;
}
 .search form input[type="text"] {
  border: 0;
  padding: 4px 4px;
  width: calc(100% - 100px);
}
 .search form input[type="submit"] {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 0 20px;
  background: #eb5d1e;
  color: #fff;
  transition: 0.3s;
  border-radius: 4px;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.search form input[type="submit"]:hover {
  background: #c54811;
}
.cross{
	display:flex;
	flex-direction:horizontal;

}
.lock{
	display:flex;
	justify-content:flex-start;
	
}
 #cut1,#cut2,#cut3,#cut4,#cut5,#cut6
    {
	  display:flex;
	justify-content:flex-end;
	padding-top:18px;
    }
</style>
</head>
<body>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">
        <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="logo mr-auto">
		@if(!Session::get('user_name'))   
        <h1 class="text-light"><a href="{{url('/product')}}"><img src="{{url('home_images/Logo.png')}}" alt="Italian Trulli"></a></h1>
	    @else
			 <h1 class="text-light"><a href="{{url('/user/product')}}"><img src="{{url('home_images/Logo.png')}}" alt="Italian Trulli"></a></h1>
			 @endif
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
        </div>
	  <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="col"></div>
		  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
           <div  id="gayab" class="search hidden-xs search-box1"><form><input  type="text" name="search" id="searchbox" placeholder="Type here"><input type="submit" value="Search"></form>
		   <div class="result"></div></div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <nav class="nav-menu d-none d-lg-block">
          
	  <ul>
	  <li id="vilupt"><a href="{{route('product')}}">Shop Now</a></li>
      <li class="drop-down"><a href="">Services</a>
            <ul>
              <li><a href="#">Legal Services</a></li>
              <li><a href="#">Mentor Support</a></li>
            <!--  <li><a href="#"></a></li>-->
              <li><a href="#">Financial Services</a></li>
            </ul>
      </li>
	 <li class="drop-down"><a href=""><i class='bx bx-bell' style="font-size:18px"></i></a>
	 <ul class="sub-menu">
              <div class="first">
			<li class="cross" ><a href="#" class="lock" disabled> your order is on the way</a> <i class="fa fa-times" id="cut1"></i> </li><hr>
    </div>
    <div class="sec">
			<li class="cross"><a href="#" class="lock" disabled>your order is on the way</a><i class="fa fa-times" id="cut2"></i></li><hr>
    </div>
    <div class="third">
	  <li class="cross"><a href="#" class="lock" disabled>your order is will be deliver in 2 days</a><i class="fa fa-times" id="cut3"></i></li><hr></div>
    <div class="fourth">
	  <li class="cross"><a href="#" class="lock" disabled>your order is delieverd</a><i class="fa fa-times" id="cut4"></i></li><hr></div>
    <div class="fifth">
	  <li class="cross"><a href="#" class="lock" disabled>your order is delieverd</a><i class="fa fa-times" id="cut5"></i></li><hr>
  </div>
  <div class="sixth">
	  <li class="cross"><a href="#" class="lock" disabled>your order is delieverd</a><i class="fa fa-times" id="cut6"></i></li><hr>
  </div>
	  
          </ul>		
	 
	 
	 </li>
	  @if(!Session::get('user_name'))
	  
      <li class="drop-down"><a href=""><i class='bx bx-user' style="font-size:18px"></i></a>
            <ul>
			
			<li><a href="{{route('UserLogin')}}">User Login</a></li>
	  <li><a href="{{route('cityadminlogin')}}">Startup Login</a></li>
          </ul>
	 
      </li>
	  @else
		  
      <li class="drop-down"><a href=""><i class='bx bx-user' style="font-size:18px"></i></a>
            <ul>
			<li><a href="#" disabled> {{Session::get('user_name')}}</a></li>
			<li><a href="{{route('edit-user',Session::get('id'))}}">User Profile</a></li>
	  <li><a href="{{route('order-history')}}">Order History</a></li>
	  <li><a href="{{route('user-logout')}}">Logout</a></li>
          </ul>		  
      </li>
	   <li><a href="{{route('cart',Session::get('id'))}}"><i  class='bx bx-cart-alt' style="font-size:18px"><sup id="cartcount">{{ !empty($cartcount)? $cartcount : Session::get('cartcount') }}</sup></i></a></li>
	    @endif
	  </ul>
	  </nav>
        </div>
   
    </div>
  </header>