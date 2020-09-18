<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body{
	 background-image: url('/public/img/6.png');
	  background-position: center; 
  background-repeat: no-repeat;
  background-size: cover; 
  opacity:0.4;
 }
 .container{
	 margin-top:3%;
 }
 .bda{
	 border: 1px solid white;
	 background-color:white;
	 width:50%;
	 height:90%;
	 margin-left:3%;
	 font-family: Poppins,sans-serif;
 }
.chota{
	border: 1px solid white;
	background-color:white;
	 width:40%;
	 height:50%;
	 margin-left:3%;
	 margin-top:5%;
}
.logo{
	float:right;
	width:40%;
	height:30%;
	
}
#bich{
	margin-left:25%;
}
#bich1{
	margin-left:30%;
}
#decor{
	border-radius:30px;
	padding:4px;
	font-size:15px;
	border:none;
}
#sidhe{
	margin-left:40%;
}
#sidh{
	margin-left:30%;
}
#inpu
{   
    font-size:12px;
	min-width:250px;
	height:40px;
	padding:12px;
	margin-left:65px;
	border:2px solid lightgrey;
}
.button{
	border-radius:26px;
	background-color: black;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}
.button1{
	border-radius:26px;
	background-color: black;
  border: none;
  color: white;
  padding: 5px 20px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
  text-decoration: none;
}
a{
	text-decoration: none;
}
a:hover{
	color:white;
	text-decoration: none;
}
.button:hover {opacity: 1}
#main6{
	margin-left:15%;
	margin-top:none;
}
#main24{
	margin-left:20%;
}
#gol{
	padding:7px;
}
#thoda{
	margin-left:4%;
	padding:5px;
}
#main8{
	margin-left:32%;
}
#l:hover{
	color:black;
}
.sarak{
	float:right;
}
</style>
</head>
<body>
<div class="container">
<div class="logo">
    <img class="logo" src="{{url('home_images/Logo.png')}}" alt="Italian Trulli">
  </div>
 <div class="row">
  
 <div class="col-lg-6 bda">
 <hr>
    <div class="head">
	<h1 id="bich">CART TOTAL</h1>
	</div>
	<hr>
	<div class="address">
	<div id="main24">
	<label><h4><b>Saved Address</b></h4></label> : 
          <select id="decor">
            @foreach($address as $home)
           <option id="gol" style="font-size:13px">{{$home->address}}</option>
            @endforeach	
          </select>
		</div>
		  <h2 id="sidhe">OR</h2>
             <div class="button1" id="sidh" onclick='newfunction()'><h5>Add New Address</h5></div><br><br>
				<div  id="main6" style="display:none">
				<h4><b id="main6">Add New Address</b></h4>
				<input type="text/int" id="inpu" name="house" placeholder="House Number">
				<input type="text/int" id="inpu" name="landmark" placeholder="Landmark">
							<input type="text" id="inpu" name="state" placeholder="State"><br>
							<input type="text" id="inpu" name="postcode" placeholder="Postcode / Zip">
							 <br><br>
			    </div>
	</div>
	<hr>
	<div class="total">
	    <div  id="main7">
		      
			  <h3 id="thoda"  style="display:inline"><b> Total :</b></h3> 
			 
			  <h4  style="display:inline">Rs.{{$cartsumvalue[0]}}</h4>
			  
		</div>
		<hr>
		<div  id="main8">
				<a href="#" class="button"> PAY NOW </a>
		</div>
	</div>
	<hr>
 </div>
 <div class="col-lg-6 chota">

    <div class="head"><br>
	 <h4 style="display:inline"><span class="glyphicon glyphicon-shopping-cart "></span>CART SUMMARY</h4>(<a id="l" style="display:inline" href="{{route('cart',Session::get('id'))}}">Edit</a>)
	 <hr>
	</div>
	<div class="list">
	
	@foreach($cart as $carts)
	
	<b> {{$carts->quantity}} X {{$carts->product_name}} </b> <b>  <div class="sarak">Rs. {{$carts->mrp}} </b> </div>
	<p>{{$carts->brand_name}}</p>
	<hr>
	
	@endforeach
	</div>
	
 </div>
 </div>
 </div>
 <script type="text/javascript">
	function newfunction(){
		document.getElementById("main24").style.display="none";
		document.getElementById("sidhe").style.display="none";
		document.getElementById("sidh").style.display="none";
		document.getElementById("main6").style.display="block";
	}
	</script>
</body>
</html>