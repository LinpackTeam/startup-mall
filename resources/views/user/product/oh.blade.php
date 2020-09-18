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
	.dec{
		padding:1px;
		border: solid-lightgrey;
		border-radius:5px;
		margin-bottom:1px;
		width:100%;
	}
	.ups{
		border-radius:5px;
	}
	</style>
</head>
<body>
	<div  id="topic">
		<div class="coll-1" id="main1">
			
			<h1> Billing details 
			</h1>
			<br>
			<form method="post" action="#">
			<div id="contents">
				<input type="text" class="bhrab " placeholder="Enter Your Full Name "  required>
		</div>
		
		<div id="contents">
				<input type="text" class="bhrab" placeholder="Enter Valid Email address" required>
		</div>
		<div id="contents">
				<input type="int" class="bhrab" placeholder="Enter Mobile number " required>
		</div>
		<div id="contents">
				<input type="text" class="bhrab" style="display:inline" placeholder="Enter House Number" required>
		</div>
		<div id="contents">
				<input type="text" class="bhrab" style="display:block" placeholder="Enter Landmark">
		</div>
		<div id="contents">
				<input type="text" class="bhrab" placeholder="Enter City / Town" required>
		</div>
		<div id="contents">
				<input type="text" class="bhrab" placeholder="Enter State" required>
		</div>
		<div id="contents">
				<input type="int" class="bhrab" placeholder="PIN" required>
		</div>
		<div id="contents">
				<label>Country:</label><select class="ups" placeholder="Choose your contry name"required>
					<option>India </option>
					<option>United state ofAmerica</option>
					<option>Iraq </option>
					<option>Pakistan </option>
					<option> Afghanistan</option>
					<option> Turkey </option>
				</select>
		</div>
		<div class="btn">
		<button> Place order</button>
	</div>
	</form>
</div>	
		<div class="coll-2" id="main2">
			<div id="details">
			 <h1><i class="fas fa-shopping-cart" aria-hidden="true"></i>CART SUMMARY  <span> <a href="{{route('cart',Session::get('id'))}}" id="summary"> (Edit) </a></span> </h1><br><hr>
			<div id="orderdetails">
			@foreach($cart as $carts)
			<div class="rows-1" id="main3">
			<h3>{{$carts->quantity}} x {{$carts->product_name}}<br> <p>{{$carts->brand_name}}</p></h3>
			
			<p id="rupees"> Rs.{{$carts->mrp}}  </p>
		</div>
		<br>
		@endforeach
		</div><br>
		<div id="totalcount" >
			<h3> Sub total : Rs. {{$cartsumvalue[0]}} </h3>
		</div>
	</div>	
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

	</script>
</body>
</html>
@endsection