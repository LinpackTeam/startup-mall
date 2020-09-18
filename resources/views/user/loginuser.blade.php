<!DOCTYPE html>
<html>
<head>
	<title> Login Form</title>
<link rel="stylesheet" type="text/css" href="{{url('public/startuplogin/css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{url('public/startuplogin/js/userlogin.js')}}"></script>

</head>
<body style="overflow: hidden;">
	
	<div class="container">
		<div class="img">
			<img src="{{url('public/startuplogin/img/bg.svg')}}">
		</div>
		<div class="login-content">
			<form id="login-form" name="login_form" role="form" style="display: block;" method="post">
			    <input type="text" name="status" id="status" style="display:none;" value="1">
			    <input type="text" name="otp2" id="otp2" style="display: none;" value="">
				<img src="{{url('public/startuplogin/img/avatar.svg')}}">
				<h2 class="title">Welcome</h2>
     
	 <div class="input-div" id="mob">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
				   
           		   		<h5>Mobile </h5>
           		   		<input type="text" class="input" id="input_mobile" required  name="mobilee">
					 </div>
				</div>
	 
	 
                    		

            	<div class="input-div" id="otp" style="display:none;">
           		 
           		   <div class="div">
           		   		<h5>OTP recieved on Mobile </h5>
           		   		<input type="text" class="input"  id="input_mobile_otp" style=" width:80%;" name="mob" >
						
						
           		   </div>
           		</div>

           		
           	{{csrf_field()}}
           			<div class="input-div" id="name" style="display:none;">
           		 
           		   <div class="div">
           		   		<h5>Name </h5>
           		   		<input type="text" class="input" name="name" >
           		   </div>
           		</div>
           		
           	<a href="#" style="display:none;" id="resetpwd">Forgot Password?</a>
            	<input type="submit" class="btn" name="login-submit" id="submit_button" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{url('public/startuplogin/js/main.js')}}"></script>
</body>
</html>

