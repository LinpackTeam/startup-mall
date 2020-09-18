<!DOCTYPE html>
<html>
<head>
	<title>reviews page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <script type="text/javascript">
             	document.addEventListener( 'DOMContentLoaded',function()

             	{
             		
             		document.querySelector('#click1').oninput= function()
             		{

             				
             		document.querySelector('#star1 ').style.color="black";
             		

             		}
             		
             		document.querySelector('#click2').oninput= function(){
             			
             			document.querySelector('#star1 ').style.color="white";
             			document.querySelector('#star2 ').style.color="black";
             			document.querySelector('#star3 ').style.color="black";
             			
             			
             		}

             		document.querySelector('#click3').oninput= function(){
             			document.querySelector('#star2 ').style.color="white";
             			document.querySelector('#star3 ').style.color="white";
             			document.querySelector('#star1 ').style.color="white";
             			
             			
             			document.querySelector('#star4 ').style.color="black";
             			document.querySelector('#star5 ').style.color="black";
             			document.querySelector('#star6').style.color="black";
             		
             			
             		}

             		document.querySelector('#click4').oninput= function(){
             			document.querySelector('#star2 ').style.color="white";
             			document.querySelector('#star3 ').style.color="white";
             			document.querySelector('#star1 ').style.color="white";
             			
             			
             			document.querySelector('#star4 ').style.color="white";
             			document.querySelector('#star5 ').style.color="white";
             			document.querySelector('#star6').style.color="white";
             			
             			

             			document.querySelector('#star7').style.color="black";
             			document.querySelector('#star8').style.color="black";
             			document.querySelector('#star9').style.color="black";
             			document.querySelector('#star10').style.color="black";
             			
             		}

             		document.querySelector('#click5').oninput= function(){
             			document.querySelector('#star2 ').style.color="white";
             			document.querySelector('#star3 ').style.color="white";
             			document.querySelector('#star1 ').style.color="white";
             			
             			
             			document.querySelector('#star4 ').style.color="white";
             			document.querySelector('#star5 ').style.color="white";
             			document.querySelector('#star6').style.color="white";
             			
             			

             			document.querySelector('#star7').style.color="white";
             			document.querySelector('#star8').style.color="white";
             			document.querySelector('#star9').style.color="white";
             			document.querySelector('#star10').style.color="white";
             			
             			

             			
             			document.querySelector('#star11').style.color="black";
             			document.querySelector('#star12').style.color="black";
             			document.querySelector('#star13').style.color="black";
             			document.querySelector('#star14').style.color="black";
             			document.querySelector('#star15').style.color="black";
             			
             		}

             	});

             </script>
</head>
<style>
	.container
	{
		width:720px;
             		border:none;
             		opacity:1;
             		background-color:white;
             		margin:auto;
             		align-items:center;
             		justify-content:center;
             		margin-top:30px;
             		margin-bottom:30px;
             		padding:20px;
	}
    
	
	body
	{
		background-color:#fef8f5;
	}
	.active
	{
	 color:black;
	}
	.heading
	{
		text-transform: uppercase;
		font-weight:bold;
		
		margin:auto;
		float :left;
		margin-left:20px;
	}

	.hover
	{
		color:blue;
	}
	.topic
	{
		display: flex;
		flex-direction:horizontal;
		margin-bottom:30px;
		margin-top:30px;

	}

	.content
	{
		display: flex;
		flex-direction:column;
		font-weight:bold;
	}
	i#top
	{
		margin-top:10px;
		color:white;
		background:#ff9248;
		border:1px solid black;
		outline:none;
		border-radius:30px;
		padding:10px;

	}
	.summary
	{
		display:flex;
		flex-direction: column;
		
	}
	.summary p
	{
		font-weight:bold;
	}
	.para
	{
		width:680px;
		height:150px;
		border:2px dotted lightgrey;
		padding:10px 14px;
		

	}
	
	.button
	{
		margin-bottom:40px;
	}
	.submit
	{

		float:right;
		background:#ff9248;
		color:white;
		outline:none;
		width:130px;
		height:40px;
		margin-top:15px;
		
		
		border:none;
		border-radius:5px;
	}
	.review
	{
		display:flex;
		flex-direction: horizontal;


	}
	.one,.two,.three,.four,.five
	{
		width:120px;
		height:50px;
		
		border:none;
		background:#ff9248;
		color:white;

	}

	.one
	{
		
		padding:14px 55px;
		border-radius:5px;
		align-items: center;
		margin-right:10px;
		margin-left:5px;
		
	}
	.four
	{
		padding:14px 25px;
		border-radius:5px;
		align-items: center;
		margin-right:10px;
		
	}
    .two
	{
		padding:14px 40px;
		border-radius:5px;
		align-items: center;
		margin-right:10px;
		
	}
	.three
	{
		padding:14px 30px;
		border-radius:5px;
		align-items: center;
		margin-right:10px;
		
	}
	.five
	{
		padding:14px 17px;
		border-radius:5px;
		align-items: center;
		margin-right:5px;
		
	}
	.regard
	{
		float:left;
	}
	.bold
	{
		font-weight: bold;
	}
	.footer
	{
		display: flex;
		flex-direction: horizontal;
	}
	
	.circle1
	{
		display:flex;
		flex-direction: column;

	}
	
	#click1,#click2,#click3,#click4,#click5
	{
		margin-left:50px;
	}

	@media (max-width:425px)
	{
	.container
	{
		
             		
             		
             		margin-top:200px;
             		margin-bottom:30px;
             		padding:20px;
             		
	}
	.submit
	{
		margin-right:50px;
	}
	.para
	{
		width:630px;
	}
	
}
	

	</style>

<body>
	<div class="container">
		<div class="topic">
		<i class="fa fa-star" aria-hidden="true" id="top"></i>
		<h1 class="heading"> Reviews </h1>
	</div>
	@foreach($user as $users)
	<div class="content">
		<p> Dear {{$users->user_name}},</p> <br>
		@endforeach
		@foreach($product as $pro)
		<p> You have recently purchased {{$pro->product_name}} .Please help us improve our customer satisfaction by writing a quick review.</p><br>
		<p> Rate {{$pro->product_name}} out of 5!</p> 
	</div> <br> <br>
	<form method="POST" action="{{route('review')}}">
		{{csrf_field()}}
	<div class="review">
		<div class="circle1">
		<input type="radio" id="click1" name="buttons" value="1"><br>
		<div class="one">

			
		<i class="fa fa-star" aria-hidden="true" id="star1"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio" id="click2"  name="buttons" value="2"><br>
	<div class="two">
		<i class="fa fa-star" aria-hidden="true" id="star2"></i>
		<i class="fa fa-star" aria-hidden="true" id="star3" ></i>
	</div>
</div>
<div class="circle1">
		<input type="radio" id="click3" name="buttons" value="3"><br>
	<div class="three">
		<i class="fa fa-star" aria-hidden="true" id="star4"></i>
		<i class="fa fa-star" aria-hidden="true" id="star5"></i>
		<i class="fa fa-star" aria-hidden="true"id="star6"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio"id="click4" name="buttons" value="4"><br>
	<div class="four">
		<i class="fa fa-star" aria-hidden="true" id="star7"></i>
		<i class="fa fa-star" aria-hidden="true"id="star8"></i>
		<i class="fa fa-star" aria-hidden="true"id="star9"></i>
		<i class="fa fa-star" aria-hidden="true"id="star10"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio"id="click5" name="buttons" value="5"><br>

	<div class="five">
		<i class="fa fa-star" aria-hidden="true"id="star11"></i>
		<i class="fa fa-star" aria-hidden="true"id="star12"></i>
		<i class="fa fa-star" aria-hidden="true"id="star13"></i>
		<i class="fa fa-star" aria-hidden="true"id="star14"></i>
		<i class="fa fa-star" aria-hidden="true"id="star15"></i>
	</div>
</div>
	
</div> <br> <br>
	<div class="summary">
		<p> Write a short review of {{$pro->product_name}}</p> <br>
		<input type="text" class="para" name="review"><br>
	</div>
	<div class="button">
		<button class="submit"> Submit Review </button> <br> <br>
	</div>
	<input type="hidden" name="product_id" value="{{$pro->product_id}}">
	<input type="hidden" name="user_id" value="{{$user_id}}">
	</form>
	@endforeach	
	
	<div class="footer">
		
	</div>
</body>
</html>