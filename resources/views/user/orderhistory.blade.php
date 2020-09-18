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
	<section class="p-t-40 p-b-10 flex-col-c-m">
		<h2 class="l-text2 t-right lga" style="color:black">
			Order History
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
							<th class="column-2">Brand</th>
							<th class="column-4">Quantity</th>
							<th class="column-3">Price</th>
							<th class="column-3">Status</th>
							<th class="column-4"></th>
							
						</tr>
                        @foreach($product as $products)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{url('public/').'/'.$products->image_path}}" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><input type="hidden" name="name" id="name" value="{{$products->product_name}}">{{$products->product_name}}</td>
							<td class="column-2">{{$products->brand_name}}</td>
							<div>
							<td class="column-2">{{$products->quantity}}</td></div>
							<td class="column-3">Rs. {{$products->mrp}}</td>
							<td class="column-3">{{$products->status_order}}</td>
							<td class="column-4"> <a href="{{route('track-order', $products->product_id)}}" style="color:orange" data-toggle="modal" data-target="#exampleModal{{$products->product_id}}">Track Order</a><br><a href="{{route('cancel-order', $products->product_id)}}" style="color:orange">Cancel Order</a><br><a href="{{route('review-order' , $products->product_id)}}" style="color:orange">Review Order</a><br><a href="{{route('customer-support')}}" style="color:orange">Customer Support</a></td>
							
						</tr>
						@endforeach
					</table>
				</div>
			</div>
			
		</div>
	</section>
</form>


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
	
	@foreach($product as $products)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$products->product_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color:orange">
				<h5 class="modal-title" id="exampleModalLabel">Track Order</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
			@if($products->status_order == 'placed')
			<div class="modal-body" style="background-color:white">
				Order Not Shipped Yet!
			</div>
			@elseif($products->status_order == 'cancelled')
			<div class="modal-body" style="background-color:white">
				Order has been cancelled!
			</div>
			@else
				<div class="modal-body" style="background-color:white">
				Shipping Details<br>
				Tracking ID : 123456789<br>
				Delivery Service : DTDC<br>
			</div>
			@endif
			<div class="modal-footer" style="background-color:white">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach 
	
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
	</script>

<!--===============================================================================================-->
	<script src="{{url('public/cssforproducts/js/main.js')}}"></script>

</body>
</html>
@endsection