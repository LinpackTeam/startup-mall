@extends('user.layout.app')
  @section('content')
  <br>
  <br>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/checkoutpage.css')}}">
	<script src="https://kit.fontawesome.com/yourcode.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
	<style>
	 input[type=submit] {
  background-color: green;
	color:white;
	width:450px;
	height:40px;
	margin-top:20px;
	padding:10px;
	margin-left:10px;
	margin-right:10px;
	margin-bottom:10px;
}
	</style>
</head>
<body>
	<div  id="topic">
		<div class="coll-1" id="main1">
			
			<h1> <b>Billing details </b>
			</h1>
		<form name="myform" onsubmit="return validateForm()">
			<br>
			<div id="contents">
		<div class="input"><input class="bhrab" type="text" placeholder="Enter Your Name" name="name" required></div>
		</div>
		<div id="contents">
				<div class="input"><input class="bhrab" type="text" placeholder="Enter Valid Email address" name="email" required></div>
		</div>
		<div id="contents">
			<div class="code">
				<div><div><input class="bhrab" type="text" name="house" placeholder="House No." id="state" required></div></div>
				<div><div><input class="bhrab" type="text" name="locality" id="zip" placeholder="Locality" required></div> </div>
			</div>
			</div>
			<div id="contents">
			<div class="code">
				<div><div><input class="bhrab" type="text" name="landmark" id="state" placeholder="Landmark"></div></div>
				<div><div><input class="bhrab" type="text" name="city" id="zip" placeholder="City/Town" required></div> </div>
			</div>
			</div>
		<div id="contents">
			<div class="code">
				<div><div><input class="bhrab" type="text" name="state" id="state" placeholder="State" required></div></div>
				<div><div><input class="bhrab" type="text" name="zip" id="zip" placeholder="PINCODE"  required></div> </div>
			</div>
			</div>
		<div id="contents">
				<label>Country:</label> <div class="input"><select placeholder="Choose your contry name" name="country" required>
					<option>India </option>
					<option>United state ofAmerica</option>
					<option>Iraq </option>
					<option>Pakistan </option>
					<option> Afghanistan</option>
					<option> Turkey </option>
				</select></div>
		</div>
		<br>
		</form>
		<div class="btn">
		
	
	
                    <form action="{!!route('payment')!!}" method="POST" >
                        <!-- Note that the amount is in paise = 50 INR -->
                        <!--amount need to be in paisa-->
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ Config::get('custom.razor_key') }}"
                                data-amount="{{$cartsumvalue[0]*100}}"
								data-classButton="btn"
                                data-buttontext="Pay Now Rs. {{$cartsumvalue[0]}}"
                                data-name="Start-Up Mall"
								
                               data-description="Order Value"
                                data-image="https://start-upmall.com/home_images/Logo.png"
                                data-prefill.name="name"
                                data-prefill.email="email"
								theme.hide_topbar="false"
                                data-theme.color="#ff7529">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>

	</div>
</div>	
		<div class="coll-2" id="main2">
			<div id="details">
			 <h1><i class="fas fa-shopping-cart" aria-hidden="true"></i><b>CART SUMMARY</b>  <span> <a href="{{route('cart',Session::get('id'))}}" id="summary"> (Edit) </a></span> </h1><br><hr>
			<div id="orderdetails">
			@foreach($cart as $carts)
			<div class="rows-1" id="main3">
			<h3><b>{{$carts->quantity}} x {{$carts->product_name}}</b><div id="brandname"> {{$carts->brand_name}} </div></h3>
			<p id="rupees"><b style="font-size:14px">  Rs.{{($carts->mrp-$carts->mrp*$carts->discount_price/100)*$carts->quantity}} </b></p>
		    </div>
			<br>
		@endforeach
		</div>
		<br>
		<div id="totalcount" >
			<h3><b style="color:black"> Sub total : Rs. {{$cartsumvalue[0]}} </b></h3>
		</div>
	</div>	
	</div>
		<br>
	</div>	
</div>
<script type="text/javascript" src="{{url('public/cssforproducts/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/popper.js')}}"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/select2/select2.min.js')}}"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
    $("#gayab").hide();
});
$( document ).ready(function() {
    $("#gone").hide();
});
$( document ).ready(function() {
    $("#hide").hide();
});

function validateForm() {
  var x = document.forms["myForm"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  
}

	</script>
</body>
</html>
@endsection