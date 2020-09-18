 @extends('user.layout.app')
  @section('content')
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/main.css')}}">
<!--===============================================================================================-->
<style>
.cart-item-no{
	position: relative;
	top: -18px;
    left: -20px; 
	background-color: orangered;
	color: white;
	border-radius: 50px;
	padding: 3px 7px;
	font-weight: bold;
	text-align: center;
}
.cart-link:hover{
	text-decoration: none;
}
.lga{
	padding-top:3%;
}
.float{
	margin-left:100%;
}
a:hover{
color:black;
}
a{
	color:white;
	text-decoration:none;
}
</style>
</head>
<body class="animsition">

	<!-- Header -->
<!-- Title Page -->
@if($cartcount[0]==0)
	<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<section class="p-t-40 p-b-10 flex-col-c-m">
    <center><img src="{{url('public/startuplogin/img/empty.png')}}" height="200" width="200"></center>
	<br>
		<h2 class="l-text2 t-right lga" style="color:black">
			Your Cart Is Empty!
		</h2>
	</section>
	@else
	<section class="p-t-40 p-b-10 flex-col-c-m">
		<h2 class="l-text2 t-right lga" style="color:black">
			Your Cart
		</h2>
	</section>

	<!-- Cart -->
	
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container" id="success">
		<form id="Form" method="POST" action="{{route('cartpost')}}">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
							<th class="column-5"></th>
						</tr>
                        @foreach($product as $products)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{url('public/').'/'.$products->image_path}}" alt="IMG-PRODUCT">
								</div>
							</td>
							
							<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
							<td class="column-2"><input type="hidden" name="name" id="name" value="{{$products->product_name}}">{{$products->product_name}}</td>
							<td class="column-3">Rs. {{$products->mrp-$products->mrp*$products->discount_price/100}}</td>
							<td class="column-4"><input type="hidden" id="quantity" name="quantity">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" id="{{$products->product_id}}" name="{{$products->mrp-$products->mrp*$products->discount_price/100}}">
										<i class="bx-120 bx bx-minus " aria-hidden="true"></i> 
									</button>
									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{$products->quantity}}">
									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" id="{{$products->product_id}}" name="{{$products->mrp-$products->mrp*$products->discount_price/100}}">
										<i class="bx-10 bx bx-plus-medical" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							@if($products->discount_price ==0)
							<td class="column-5" id="total{{$products->product_id}}">Rs.{{$products->mrp*$products->quantity}}</td>
						@else
							<td class="column-5" id="total{{$products->product_id}}">Rs.{{($products->mrp-$products->mrp*$products->discount_price/100)*$products->quantity}}</td>
						@endif
							<td class="column-6"><a href="{{route('del-item',$products->product_id)}}" style="color:gray"><span class="glyphicon glyphicon-trash" href="#"></span></a></td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 m-r-10">
					</div>
					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">		
					</div>
				</div> 
				<div class="size10 trans-0-4 m-t-10 m-b-10">	 
				</div>
				<a href="{{route('del-cart')}}" style="color:grey"><u>Empty Cart</u></a>
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="sub">
					<a href="{{route('checkout')}}">
						Proceed to Checkout
						</a>
					</button>
					
				</div>
			</div>
			
		</div>
	</section>
</form>

@endif
	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>
  <script src="{{url('public/cssforproducts/assets/vendor/jquery/jquery.min.js')}}"></script>



<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/popper.js')}}"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/select2/select2.min.js')}}"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
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