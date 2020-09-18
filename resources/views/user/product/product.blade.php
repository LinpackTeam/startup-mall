  @extends('user.layout.app')
  @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Start-up Mall</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('public/cssforproducts/css/main.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
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
.decor{
	border:solid rainbow;
	padding:3px;
	border-radius:15px;
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
  @import url('https://fonts.googleapis.com/css2?family=Alegreya+Sans&family=Raleway&display=swap');
	
	h5
	{
color:grey;
font-size: 17px;
text-transform: uppercase;
font-weight:500px;
	}
  .card-body
  {
    background: #fcfcfb;
    padding:5px; 
  }
  #rating
  {
    border:2px solid white;
    background:#eb5d1e;
    border-radius:20px;
    float:left;
    padding:0px;
    font-size:13px;
    color:white;
    margin-bottom:2px;
 border:solid black 1px;

  }
  
  #details
  {
	  
    display: flex;
    flex-direction: horizontal;
  }
  #icon
  {
    color: black;
    font-size: 5px;
    padding:5px;
  }

  .card-text
  {
    font-size:14px;
    font-weight:500;
  }
  #tooltip
  {
    font-family: 'Arail', sans-serif;
font-family: 'arail', sans-serif;
   color:#545454;
  }
    .card:hover
    {

  transform: translateY(-5px);
  border-bottom-color: #ef7f4d ;

    }
  .card
  {
     box-shadow:0px 6px 19px 0px lightgray;
     transition: all 0.3s ease-in-out;
	
     border-bottom: 4px solid #fff;
    border-radius:0 px;
	width:100%;
	
	padding-bottom:0px;
	margin-bottom:20px;
  }
  body
  {
    background-color:#fff;
  }
  .event
  {
    font-size:13px;
    margin:0px;
    padding-bottom:1px;
    color:lightgrey;
  }
  .discount
  {
    display:flex;
    flex-direction:column; 
    float:right;


}
.img
	{
		overflow: hidden;

	}
  
  
.discountdet
{
  font-size: 12px
  
  padding-bottom:0px;
}

a
{
  font-size:12px;
}
#price
{
	margin-top:5px;
 margin-left:70%;
  text-align:right;
  float:right;

}
#date
{
  font-size:13px;
}


.eventdet
{
  margin-top:30px;
  margin-bottom: -40px;
  padding-left:2px;
  
}



a
{
  text-decoration:none;
} 
#sath{
	display: flex;
    flex-direction: horizontal;
	
}
#cardsrow{
	padding-left:20px;
	width:100%;
	padding-right:10px;
}
#glass{
    margin-left:25px;
	margin-right:25px;
	padding:15px;
	
}
.pagination{
	align-items:center;
}
body{
	font-family: arail , sans-serif;
}

	</style>
<body class="animsition">
<br>
<br>

  <section class="bgwhite p-t-55 p-b-65">
		<div class="container-fluid">
			<div class="row" id="rowregis">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm fixed" id="glass">
						<!--  -->
						<form action="{{route('categoryfilter')}}" method="post">
						<div class="myBox">
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>
						<ul class="p-b-54">
							<li class="p-t-4">
								@foreach($categories as $category)
								{{csrf_field()}}
								<input type="checkbox" class="s-text13" name="category[]" value="{{$category->type}}">
                                <label for="category" class="s-text13"> {{$category->type}}</label><br>
								@endforeach								
							</li>	
						</ul>
						</div>
						<hr>
				<button class="btn" style="background-color:#eb5d1e;color:#fff">APPLY</button></form>
						<br><br>
						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>
							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									 Rs.<span id="value-lower">610</span> - Rs.<span id="value-upper">10,000</span>
								</div>
							</div>
						</div>

						<div class="filter-color p-t-22 p-b-50 bo3">
							
						</div>

						<!--<div class="search-product pos-relative bo4 of-hidden">
							

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>-->
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–15 of {{$count}} results
						</span>
					</div>
<div class=" align-items-center " id="bottle">
	<div class="row" id="cardsrow">
	@foreach($product as $products)
  <div class="col-12 mb-2 col-md-6 col-xl-3">
  <div class="card" >
    <div class="img">
    <a href="{{route('productdetail',$products->product_id)}}"><img src="{{url('public/').'/'.$products->image_path}}" class="card-img-top fluid thumbnail" alt="not supported"  width="400" height="200" >
</a>
</div>
    <div class="card-body p-1">
      <h5 class="card-title"><b style="font-size:10px">{{$products->product_name}}</b></h5>
      <p class="card-text" id="tooltip">{{$products->brand_name}} </p>


                                    <div class="block2-overlay trans-0-4">
										<a href="{{route('product')}}" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>
										
										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" >
												Add to Cart
											</button>
										</div>
										
									</div>
<div class="block2-name" style="display:none">{{$products->product_name}}</div>
  <p  id="details" style="float:left" ><p id="rating" class="block1-name"> <i class="fa fa-star" style="color:yellow; font-size:10px" id="icon"></i></p>
      
	    @if($products->discount_price == 0)
       <span id="price" style="float:right">Rs. {{$products->mrp}}</span></p>
   @else
	    <span id="price" style="float:right"><p style="font-size:7px">Rs. <del>{{$products->mrp}}</del></p>Rs. {{$products->mrp-$products->mrp*$products->discount_price/100}}</span></span></p>
     @endif
    </div>
  </div>
  </div>
  @endforeach
  
  
</div>
<div class="row " id="cardsrow">
   
  
</div>
<div class="row " id="cardsrow">
</div>

<div class="row " id="cardsrow">
 
 

</div>
</div>

<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a> 
					</div>
    </div>

<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="{{url('public/cssforproducts/vendor/sweetalert/sweetalert.min.js')}}"></script>
	<script type="text/javascript">
	


		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			var product_id = $(this).parent().parent().parent().find('#productid').html();
			var price = $(this).parent().parent().parent().find('#price').html();
					
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
 "_token": "{{ csrf_token() }}",					
				},
				cache: false,
				 
				success: function(dataResult){
					document.getElementById("cartcount").innerHTML = $.trim(dataResult.cartcount);
					if($.trim(dataResult.status) === "5"){
						document.getElementById("cartcount").innerHTML = $.trim(dataResult.cartcount);
					
					swal(nameProduct, "is added to cart !", "success");
					}
					 else if($.trim(dataResult.status) === "1"){
					
					swal(nameProduct, "is already added to cart !", "success");
					}
					else if($.trim(dataResult.status) === "4"){
					
					swal( "Please Login to Add items to the cart !");
					}
				}
			});
});
		});		

$( document ).ready(function() {
	
	$("#hide").hide();
});
$( document ).ready(function() {
    $("#vilupt").hide();
});
$( document ).ready(function() {
    $("#gone").hide();
});



</script>
    

<!--===============================================================================================-->
		
	
<!--===============================================================================================-->


    

@endsection
 
  </body>
</html>