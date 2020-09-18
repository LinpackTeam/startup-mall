<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomeUserController extends Controller
{
    
    public function main(Request $request)
    {
		
		return view('user.homeuser');
	}
	public function product(Request $request)
	{
		//$user_email=Session::get('user');
		$cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		  $categories=DB::table('start_upcategory')
                    ->get();		  
          $product = DB::table('product')
    	 		 //->where('product_id',$product_id)
    	 		    ->get();
		 
		$count=count($product);
        return view('user.product.product',compact("product","categories","count","cartcount"));
		//return view('user.product.product');
	}
	public function categoryfilter(Request $request){
		
		$category=$request->input('category');
		
				$cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		  $categories=DB::table('start_upcategory')
                    ->get();
					
          $product = DB ::table('start_upcategories')
		            ->join('subcat','start_upcategories.category_id','=','subcat.category_id')
					->join('product','product.subcat_id','=','subcat.subcat_id')
					->select('start_upcategories.*','product.*','subcat.*')
					->where('start_upcategories.category_name','=',$category)
					->get();

		 
		$count=count($product);
	return view('user.product.product',compact("product","categories","count","cartcount","category"));
		
	}
	public function livesearch(Request $request){
				$term=$request->id;
				$output='';
		$data = DB::table('product')
        ->select('product_name')   
        ->where('product_name', 'like', '%' . $term . '%')
        ->get();

foreach ($data as $key => $product) {
$output.=$product->product_name;
}

		return response($output);
	
		
	}
	public function productdetail(Request $request)
	{     
	$cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
	    $product_id=$request->product_id;
		/*$product=DB::table('product')
		        ->where('product_id',$product_id)
				->get(); */
		$tech=DB::table('technical_details')
		        ->where('product_id',$product_id)
				->get();
		/*$subcat_id=[14];// DB::table('product')
		     // ->select(['subcat_id'])
				//->where('product_id',$product_id)
				//->get();
		$categories=DB::table('subcat')
		          ->whereIn('subcat_id',$subcat_id)
				  ->get(); */
        $product = DB::table('product')
            ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
            ->join('start_upcategories', 'subcat.category_id', '=', 'start_upcategories.category_id')
            ->select('product.*', 'subcat.subcat_name', 'start_upcategories.*')
			->where('product_id',$product_id)
            ->get();		
		$images=DB::table('product_img')
		          ->where('type','p_img')
				  ->where('product_id',$product_id)
				  ->get();
		return view('user.product.pd',compact("product_id","tech","images","product","cartcount"));
	}
	public function cart(Request $request)
	{   
	  if(session::has('id')){
		$userid=$request->user_id;
		$cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
	    $product=	DB::table('cart')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
            ->select('cart.*', 'product.*')
			->where('cart.user_id','=',$userid)
            ->get();
	
		return view('user.product.cart',compact("product","userid","cartcount"));
	   }
	   else{
		   return redirect()->route('UserLogin')->withErrors('Try again');
	   }
	}
	
	public function itemremovecart(Request $request)
	{
		$product_id=$request->id;

$user_id=session::get('id');
		DB::table('cart')
		->where('product_id', $product_id)
		->where('user_id', $user_id)
		->delete();
		$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
			 return redirect()->route('cart', [session::get('id')]);	
	}
	public function deletecart(Request $request)
	{
		$user_id=session::get('id');
		DB::table('cart')
		
		->where('user_id', $user_id)
		->delete();
		$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
			return redirect()->route('cart', [session::get('id')]);
	}
	public function cartupdate(Request $request)
		{ 
		
		$product_id=$request->product_id;
		
		$user_id=session::get('id');
		$action=$request->action;
		if($action=='plus')
		{
			$cart1= DB::table('cart')
	       ->where('product_id',$product_id)
		   ->where('user_id',$user_id )
			->increment('quantity');
			$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
			 return response()->json(array('status'=> 1,"cartcount"=>$count), 200);
		}
		else
		{
			$cart= DB::table('cart')
	       ->where('product_id',$product_id)
		   ->where('user_id',$user_id )
			->decrement('quantity');
			$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
				 return response()->json(array('status'=> 1,"cartcount"=>$count), 200);
			
		}
	}
	public function cartpost(Request $request)
	{   
	
	$user_id=$request->user_id;
		$product_id=$request->product_id;
		
		$user_id=session::get('id');
	$cart= DB::table('cart')
	       ->where('product_id',$product_id)
		   ->where('user_id',$user_id )
		   ->first();
	if(session::has('id')){
     if($cart){
		 	$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		 return response()->json(array('status'=> 1,"cartcount"=>$count), 200);
	 }
     else{
	 $quantity=$request->quantity;
		//$insertranstion=DB::table('transaction')
		        //       ->insert(['user_id'=>$user-id,'table'=>'product']);
		$insert=DB::table('cart')
		         ->insert(['user_id'=>$user_id,'product_id'=>$product_id,'quantity'=>$quantity]);
				 	$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		return response()->json(array('status'=> 5,"cartcount"=>$count), 200);
	}}
	else{
		return response()->json(array('status'=> 4,"cartcount"=>0));
	}}
	public function checkout(Request $request)
	{   
	 if(session::has('id')){
		 $cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		 $user_id=session::get('id');
		 $cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		 $cart= DB::table('cart')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
            ->select('cart.*', 'product.*')
			->where('cart.user_id','=',$user_id)
            ->get();
			
	     $cartsumvalue= DB::table('cart')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
             ->selectRaw('SUM(cart.quantity * product.mrp - product.mrp*product.discount_price/100) as total')
			->where('cart.user_id','=',$user_id)
           ->pluck('total');
			
		 $address= DB::table('user_address')
            ->select('address')
			->where('user_id',$user_id)
            ->get();
		
		return view('user.product.checkout',compact("user_id","cart","address","cartsumvalue","cartcount"));
	 }
	 else{
	 return redirect()->route('UserLogin')->withErrors('Try again');
	 }
	} 
	 public function Edituser(Request $request)
{
	 $mobile=Session::get('user_mobile');
	 $user_id=$request->user_id;
     $user=DB::table('user_data')
                ->where('user_phone',$mobile)
                ->first();
	 return view('user.edituser',compact("mobile","user_id","user"));
}
    public function userUpdateProfile(Request $request)
    {
        
        $user_id = $request->user_id;
        $user_name = $request->name;
        $user_phone = $request->mobile;
		$email=$request->email;
		$b_name = $request->b_name;
        $b_email = $request->b_email;
		$gstin=$request->gstin;
        $date=date('d-m-y');
		
            $value=array('user_name'=>$user_name,'user_phone'=>$user_phone,'business_name'=>$b_name,'business_email'=>$b_email,'gstin'=>$gstin,'user_email'=>$email);
        

        $userChangeProfile = DB::table('user_data')
                                ->where('id', $user_id)
                                ->update($value);
		
        if($userChangeProfile){

             session::put('user_phone',$user_phone);

$msg='<!DOCTYPE html>
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
             	document.addEventListener( "DOMContentLoaded",function()
             	{	
             		document.querySelector("#click1").oninput= function()
             		{
             				
             		document.querySelector("#star1 ").style.color="black";
             		

             		}
             		
             		document.querySelector("#click2").oninput= function(){
             			
             			document.querySelector("#star1 ").style.color="white";
             			document.querySelector("#star2 ").style.color="black";
             			document.querySelector("#star3 ").style.color="black";
             			
             			
             		}

             		document.querySelector("#click3").oninput= function(){
             			document.querySelector("#star2 ").style.color="white";
             			document.querySelector("#star3 ").style.color="white";
             			document.querySelector("#star1 ").style.color="white";
             			
             			
             			document.querySelector("#star4 ").style.color="black";
             			document.querySelector("#star5 ").style.color="black";
             			document.querySelector("#star6").style.color="black";
             		
             			
             		}

             		document.querySelector("#click4").oninput= function(){
             			document.querySelector("#star2 ").style.color="white";
             			document.querySelector("#star3 ").style.color="white";
             			document.querySelector("#star1 ").style.color="white";
             			
             			
             			document.querySelector("#star4 ").style.color="white";
             			document.querySelector("#star5 ").style.color="white";
             			document.querySelector("#star6").style.color="white";
             			
             			

             			document.querySelector("#star7").style.color="black";
             			document.querySelector("#star8").style.color="black";
             			document.querySelector("#star9").style.color="black";
             			document.querySelector("#star10").style.color="black";
             			
             		}

             		document.querySelector("#click5").oninput= function(){
             			document.querySelector("#star2 ").style.color="white";
             			document.querySelector("#star3 ").style.color="white";
             			document.querySelector("#star1 ").style.color="white";
             			
             			
             			document.querySelector("#star4 ").style.color="white";
             			document.querySelector("#star5 ").style.color="white";
             			document.querySelector("#star6").style.color="white";
             			
             			

             			document.querySelector("#star7").style.color="white";
             			document.querySelector("#star8").style.color="white";
             			document.querySelector("#star9").style.color="white";
             			document.querySelector("#star10").style.color="white";
             			
             			

             			
             			document.querySelector("#star11").style.color="black";
             			document.querySelector("#star12").style.color="black";
             			document.querySelector("#star13").style.color="black";
             			document.querySelector("#star14").style.color="black";
             			document.querySelector("#star15").style.color="black";
             			
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
	<div class="content">
		<p> Dear User,</p> <br>
		<p> You have recently purchased My Products .Please help us improve our customer satisfaction by writing a quick review.</p><br>
		<p> Rate My Product out of 5</p> 
	</div> <br> <br>
	
	<div class="review">
		<div class="circle1">
		<input type="radio"id="click1" name="buttons" value="a"><br>
		<div class="one">

			
		<i class="fa fa-star" aria-hidden="true" id="star1"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio" id="click2"  name="buttons" value="b"><br>
	<div class="two">
		<i class="fa fa-star" aria-hidden="true" id="star2"></i>
		<i class="fa fa-star" aria-hidden="true" id="star3" ></i>
	</div>
</div>
<div class="circle1">
		<input type="radio" id="click3" name="buttons"><br>
	<div class="three">
		<i class="fa fa-star" aria-hidden="true" id="star4"></i>
		<i class="fa fa-star" aria-hidden="true" id="star5"></i>
		<i class="fa fa-star" aria-hidden="true"id="star6"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio"id="click4" name="buttons"><br>
	<div class="four">
		<i class="fa fa-star" aria-hidden="true" id="star7"></i>
		<i class="fa fa-star" aria-hidden="true"id="star8"></i>
		<i class="fa fa-star" aria-hidden="true"id="star9"></i>
		<i class="fa fa-star" aria-hidden="true"id="star10"></i>
	</div>
</div>
<div class="circle1">
		<input type="radio"id="click5" name="buttons"><br>

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
		<p> Write a short review of My Product</p> <br>
		<input type="text" class="para"><br>
	</div>
	<div class="button">
		<button class="submit"> Submit Review </button> <br> <br>
	</div>
		
	
	<div class="footer">
		<p class="bold"> Cannot See this form? </p><a href=#> Click here</a> to write your review online	</div><br>
			<p class="regard">
			My Product </p>

	</div>
</body>
</html>
';
    $subject='Product-Added';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($receiver_email,$subject,$msg,$headers))
return redirect()->back()->withErrors('product added successfully');
else
	return redirect()->back()->withErrors('try again');
	  

            return redirect()->back()->withErrors('profile updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
    }
	public function orderhistory(Request $request)
	{    
	    $user_id = session::get('id');
		$cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
		$product=	DB::table('order_history')
            ->join('product', 'order_history.product_id', '=', 'product.product_id')
            ->select('order_history.*', 'product.*')
			->where('order_history.user_id','=',$user_id)
            ->get();
	
		return view('user.orderhistory',compact("user_id","product","cartcount"));
	}
	public function userLogout(Request $request)
     {
          $request->session()->flush();
           return redirect()->route('main')->withErrors("Enter Mobile number");

     }
	 public function paysucess(){
		 
		return view('user.paymentsuccess');
	}
	public function cancelorder(Request $request){
		$user_id = session::get('id');
		$product_id=$request->id;
		$oh=DB::table('order_history')
			 ->where('user_id',$user_id)
			 ->where('product_id',$product_id)
			  ->update(['status_order'=>'cancelled']);
	    if($oh){
			return redirect()->back()->witherrors('Order Cancelled');
		}
		else{
			return redirect()->back()->witherrors('Try Again Later!');
		}
	}
	public function revieworder(Request $request){
		$user_id = session::get('id');
		$product_id=$request->id;
		$user=DB::table('user_data')
		     ->where('id',$user_id)
			 ->get();
		$product=	DB::table('order_history')
            ->join('product', 'order_history.product_id', '=', 'product.product_id')
            ->select('order_history.*', 'product.*')
			->where('order_history.user_id','=',$user_id)
			->where('product.product_id','=',$product_id)
            ->get();
		return view('user.reviews',compact("user_id","user","product"));
	}
	public function review(Request $request){
		$user_id=$request->user_id;
		$product_id=$request->product_id;
		$star=$request->buttons;
		$review=$request->review;
		$insert=DB::table('review')
		     ->insert(['stars'=>$star,'user_id'=>$user_id,'product_id'=>$product_id,'review'=>$review]);
		if($insert){
			return redirect()->route('product')->witherrors('Thank You For reviewing');
		}
		else{
			return redirect()->route('product')->witherrors('Try Again Later!');
		}
	}
	public function track(Request $request){
		$product_id=$request->id;
		
	}
	public function customersupport(Request $request){
		 return view('user.customersupport');
	}
}