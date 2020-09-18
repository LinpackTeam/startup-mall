 @extends('user.layout.app')
  @section('content')
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/animate/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/slick/slick.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/noui/nouislider.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/main.css')}}">
<!--===============================================================================================-->
    
    
<style>

::-webkit-scrollbar {
width: 12px;
height: 12px;
}

::-webkit-scrollbar-track {
background: #f5f5f5;
border-radius: 10px;
}

::-webkit-scrollbar-thumb {
border-radius: 10px;
background: #ccc;  
}

::-webkit-scrollbar-thumb:hover {
background: #999;  
}
.myBox {
border: none;
padding: 5px;
font: 16px;
width: 230px;
height: 270px;
overflow: auto;
}
@media only screen and (min-width: 600px) {
.fixed{
	position:fixed;
	z-index: 1;
	overflow-x: hidden;
}
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
</style>
<br>
<br>
<body class="animsition">
    <div style="padding:30px"></div>
  <div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
		<!--Carousel Wrapper-->
			<div class="w-size13 p-t-30 respon5">
				<div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
  @php ($i = 1)
  @foreach($images as $image)


  @if($i==1) 
	  <div class="carousel-item active">
  @else
	   <div class="carousel-item">
   @endif
 
      <img class="d-block w-100" src="{{url('public/').'/'.$image->path}}"
        alt="{{$image->path}}">
    </div>
	@php ($i++)
	@endforeach
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->

</div>
<!--/.Carousel Wrapper-->
			</div>

			<div class="w-size14 p-t-30 respon5">
			@foreach($product as $products)
				<h4 class="product-detail-name m-text16 p-b-13">
				{{$products->product_name}}
				</h4>

             <input type="hidden" value="{{$products->product_name}}" id="nameProduct" >
             <input type="hidden" value="{{$products->product_id}}" id="productid" >
             <input type="hidden" value="{{$products->mrp}}" id="itemprice" >
      
               
				<span class="m-text17" id="price">
				@if($products->discount_price ==0)
					Rs. {{$products->mrp}}
				@else 
					Rs. <del>{{$products->mrp}}</del>  {{$products->mrp-$products->mrp*$products->discount_price/100}}
			   @endif
				</span>

			    <p class="s-text8 p-t-10">
				{{$products->brand_name}}
				</p>
				
				<div class="p-t-33 p-b-60">
				
					<div class="flex-m flex-w p-b-10">
					@foreach($tech as $techs)
						<div class="s-text15 w-size15 t-center">
							
							{{$techs->category}}
						</div>
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>{{$techs->value}}</option>
							</select>
						</div>
						@endforeach
					</div>
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
							</div>
							
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Add to Cart
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="p-b-45">
					<span class="s-text8">Categories:
					{{$products->subcat_name}}
							</span>
				</div>
				
				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
						{{$products->description}}
						</p>
					</div>
				</div>
          @endforeach
			</div>
			</div>			
 <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>



  <!-- Vendor JS Files -->
  <script src="{{url('public/cssforproducts/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('public/cssforproducts/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('public/cssforproducts/assets/js/main.js')}}"></script>
    
    
    <!-- Product Page -->
    

<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
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
    $("#hide").hide();
});
$( document ).ready(function() {
    $("#vilupt").hide();
});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/daterangepicker/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/slick/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script type="text/javascript">
		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('#nameProduct').val();
			var product_id = $('#productid').val();
			var price = $('#itemprice').val();
			var quantity = $('#quantity').val();
					
			$(this).one('click', function(){
				
				event.stopPropagation()
				
				$.ajax({
				url: '/user/cart',
				dataType: "json",
				type: "POST",
				data: {
					product_id: product_id,
					price: price, 
					
					quantity:1,
 "_token": "{{ csrf_token() }}"		
				},
				cache: false,
				success: function(dataResult){
					document.getElementById("cartcount").innerHTML = $.trim(dataResult.cartcount);
					if($.trim(dataResult.status) === "5"){
				
					swal(nameProduct, "is added to cart !", "success");
					}
					 else if($.trim(dataResult.status) === "1"){
					
					swal(nameProduct, "is already added to cart !", "success");
					}
					else if($.trim(dataResult.status) === "4"){
					
					swal("Please Login to Add items to the cart !");
					}
				}
			});
});
		});


	
	</script>

<!--===============================================================================================-->
		<script type="text/javascript" src="{{url('public/cssforproducts/vendor/noui/nouislider.min.js')}}"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
<script src="{{url('public/cssforproducts/js/main.js')}}"></script>
    <script>
  document.addEventListener("DOMContentLoaded", () => {
	 
   inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
  });
</script>
    
</body>

</html>


