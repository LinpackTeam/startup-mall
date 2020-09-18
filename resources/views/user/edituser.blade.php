@extends('user.layout.app')
@section ('content')
<!DOCTYPE html>
<html>
<head>
	<title>user profile</title>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script>
  	$(document).ready(function(){
  		$(".Individual").show();
  $(".Business").hide();
  $('.one').addClass("active");
  
$(".two").click(function(){
  $(".Individual").hide();
  $(".Business").fadeIn(600);
  $('.one.active').removeClass("active");
  $(this).addClass("active");


});
$(".one").click(function(){
  $(".Individual").fadeIn(600);
  $(".Business").hide();
  $('.two.active').removeClass("active");
  $(this).addClass("active");
});


});
</script>
        

	<style>
		body
		{
			background-color: #fef8f5;
		}
		.active{
            background:#ff9248;
           color:white;
           padding:10px;

			
			width:250px;
			text-align: center;
			
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
  }
  
		.container
		{
			background-color: white;
			width:600px;
			margin-top:200px;
			margin-bottom:50px;
			border-top:3px solid #eb5d1e;
			border-bottom:3px solid #eb5d1e;

		}
		h2
		{
			color:black;
		}
		.heading
		{
			display:flex;
			flex-direction: horizontal;
			align-items:center;
			justify-content: center;
			margin:auto;
			margin-top:20px;

		}
		.krab
		{
			padding:10px;
			color:white;
			border:1px solid grey;
			width:250px;
			text-align: center;
			background-color:black;
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
		}
		.krab:active
		{
			background-color: lightgrey;
			text-decoration: none;
		}
		.krab:focus
		{
			background-color: lightgrey;
			text-decoration: none;
		}
		.krab:hover
		{
			color:white;
			text-decoration: none;
			background-color: #ff9248;
		}
		
		

		.Individual,.Business
		{
			align-items:center;
			justify-content: center;
			margin:auto;
		}
		.form,.form2
		{
			display:flex;
			flex-direction:column;
			margin-left:40px;
			margin-right:50px;

			
		}
		.one,.two
		{
			text-decoration: none;
		}
		
		.form input
		{
			padding:18px;
			width:500px;
			margin:auto;
			margin-bottom:20px;
			margin-top:20px;
			border:1px solid lightgrey;

		}
		button
		{
			background-color: #eb5d1e;
			color:white;
			width:500px;
			margin:auto;
			margin-bottom:20px;
			margin-top:20px;
			font-size:40px;
			padding:5px;
			height:50px;
			border:1px solid lightgrey;
			border-radius:5px;
		}
		.form2 input
		{
			padding:18px;
			width:500px;
			margin:auto;
			margin-bottom:20px;
			margin-top:20px;
			border:1px solid lightgrey;

		}
		.topic,.topic2
		{
			align-items:center;
			justify-content: center;
			text-align:center;
		}
		@media (max-width:425px)
		{
			.container
		{
			
			width:400px;
			margin-top:150px;
			margin-left:10px;
			margin-right:10px;
			margin-bottom:50px;
			

		}

		.form,.form2
		{
			
			margin-left:0px;
			margin-right:0px;	
		}
		button
		{
			
			width:350px;
			
		}
		.form input
		{
			width:350px;
		}
		.form2 input
		{
			width:350px;
		}
		.Individual,.Business
		{
			
			margin-left:5px;
			margin-right:10px;
		}

		}
		@media (max-width:375px)
		{
			
			.container
		{
			
			width:350px;
			margin-top:150px;
			margin-left:10px;
			margin-right:10px;
			margin-bottom:50px;
			

		}
		.krab
		{
			padding:10px;
			color:white;
			border:1px solid grey;
			width:150px;
			text-align: center;
			background-color:black;
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
		}


		.form,.form2
		{
			
			margin-left:0px;
			margin-right:0px;

		}
		button
		{
			
			width:300px;
			
		}
		.form input
		{
			width:300px;
			margin-left:0px;
			margin-right:0px;
		}
		.form2 input
		{
			width:350px;
		}
		.Individual,.Business
		{
			
			margin-left:5px;
			margin-right:5px;
		}
		.active{
            background:#ff9248;
           color:white;
           padding:10px;

			
			width:150px;
			text-align: center;
			
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
  }

		}
		@media (max-width:320px)
		{
			.container
		{
			
			width:300px;
			margin-top:200px;
			margin-left:5px;
			margin-right:5px;
			margin-bottom:50px;
			

		}
		.active{
            background:#ff9248;
           color:white;
           padding:10px;

			
			width:150px;
			text-align: center;
			
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
  }

		.form,.form2
		{
			
			margin-left:0px;
			margin-right:0px;

		}
		button
		{
			
			width:260px;
			
		}
		.form input
		{
			width:260px;
			margin-left:0px;
			margin-right:0px;
		}
		.form2 input
		{
			width:260px;
		}
		.Individual,.Business
		{
			
			margin-left:5px;
			margin-right:5px;
		}
		.krab
		{
			padding:10px;
			color:white;
			border:1px solid grey;
			width:150px;
			text-align: center;
			background-color:black;
			font-size:30px;
			text-decoration: none;
			cursor:pointer;
			}


		}

		.alert{
			padding:3px;
		}	
		
	</style>
		
</head>
<body>

	<div class="container">
	<div>@if (count($errors) > 0)
                      @if($errors->any())
                        <div class="alert alert-primary alert-block" role="alert">
                          {{$errors->first()}}
                          <p type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </p>
                        </div>
                      @endif
                  @endif
</div>
		<div class="heading">
			<a href="#Individual" class="one krab"> Individual </a>
			<a href="#Business" class="two krab"> Business</a>
		</div>
		<div class="Individual">
		<div class="topic">
			<h2>
			Individual Profile
		</h2>

		</div>
		<div class="form">
		<form method="POST" action="{{route('update-user',$user_id)}}">
			{{csrf_field()}}
			<input type="text" placeholder="Enter your Name" name="name" autocomplete="off" required >
			<input type="email" placeholder="Enter Email Id" name="email" autocomplete="off" required >
			<input type="text" placeholder="Mobile Number" name="mobile" required>
			<button> <h4> Submit </h4></button>
        </form>
		</div>
	</div>
	
	<div class="Business">
		<div class="topic2">
			<h2>
			Business Profile
		</h2>

		</div>
		<div class="form2">
		<form method="POST" action="{{route('update-user',$user_id)}}">
			{{csrf_field()}}
			<input type="text"placeholder="Enter Business Name" name="b_name" autocomplete="off" required >
			<input type="email" placeholder="Enter Business mail id" name="b_email" autocomplete="off" required >
			<input type="text" placeholder="GSTIN" name="gstin" required>
			<button> <h4> Submit </h4></button>
        </form>
		</div>
	</div>
	</div>

	 <script src="{{url('public/cssforproducts/assets/vendor/jquery/jquery.min.js')}}"></script>



<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/popper.js')}}"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/select2/select2.min.js')}}"></script>
	<script type="text/javascript">
		
		$( document ).ready(function() {
    $("#vilupt").hide();
});
	$( document ).ready(function() {
    $("#gayab").hide();
});
$( document ).ready(function() {
    $("#gone").hide();
});
$( document ).ready(function() {
    $("#hide").hide();
});

	</script>

<!--===============================================================================================-->
	<script src="{{url('public/cssforproducts/js/main.js')}}"></script>




</body>
</html>
@endsection