<?php
namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use DB;
use Session;
use Redirect;

class RazorpayController extends Controller
{    
    public function payWithRazorpay()
    {        
        return view('payWithRazorpay');
    }

    public function payment(Request $request)
    {
        //Input items of form
		
        $input = $request->all();
        //get API Configuration 
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('status',0);
                  return redirect()->route('paysucess');
            }

            // Do something here for store payment details in database...
        }
        
       \Session::put('status',1);
	   $userid=session::get('id');
	   $cartcount=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
	    $product=	DB::table('cart')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
            ->select('cart.*', 'product.*')
			->where('cart.user_id','=',$userid)
            ->get();
		$cartsumvalue= DB::table('cart')
            ->join('product', 'cart.product_id', '=', 'product.product_id')
             ->selectRaw('SUM(cart.quantity * product.mrp) as total')
			->where('cart.user_id','=',$userid)
           ->pluck('total');
	   $msg='<!DOCTYPE html>
<html>
<head>
	<title>email template</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
             <style>
             	
             	
             	.container
             	{
             		width:680px;
             		border:1px solid lightgrey;
             		opacity:1;
             		background-color: #ebebeb;
             		margin:auto;
             		align-items:center;
             		justify-content:center;
             		margin-top:30px;
             		margin-bottom:30px;
             		padding:20px;
             		
             	}
             	.heading
             	{
             		float:left;
             		margin:auto;
             		margin-top:30px;
             		

             	}
             	
             	.content1
             	{
             		
             		margin-top:70px;
             		border:1px solid lightgrey;
             		border-radius:14px;
             		width:635px;
             		height:130px;
             		background-color: white;
             		padding:25px;
             	}
             	.content2
             	{
             		display:flex;
             		flex-direction:horizontal;
             		margin-top:10px;
             		

             	}
             	.subcontent1
             	{
             		width:320px;
             		height:190px;
             		background-color: white;
             		padding:18px;
             		margin-right:10px;
             		border:1px solid lightgrey;
             		border-radius:30px;
             	}
             	.subcontent2
             	{
             		width:320px;
             		height:250px;
             		background-color: white;
             		padding:18px;
             		margin-right:10px;
             		border:1px solid lightgrey;
             		border-radius:30px;
             	}
             	.content4
             	{
             		margin-top:10px;
             		border:1px solid lightgrey;
             		border-radius:30px;
             		width:635px;
             		height:125px;
             		background-color: white;
             		padding:25px;
             	}
             	.content5
             	{
             		margin-top:10px;
             		border:1px solid lightgrey;
             		border-radius:30px;
             		width:635px;
             		height:135px;
             		background-color: white;
             		padding:25px;

             	}
             	.content3
             	{
             		margin-top:10px;
             		border:1px solid lightgrey;
             		border-radius:30px;
             		width:635px;
             		height:170px;
             		background-color: white;
             		padding:14px;
             	}
             	.bold
             	{
             		font-weight:bold;
             		margin-bottom:18px;
             	}
             	.tops
             	{
             		text-align:center;
             		font-weight:bold;
             	}
             	.details
             	{
             		display:flex;
             		flex-direction:horizontal;
             		justify-content: space-between;
             	}
             	
             	#brand
             	{
             		margin-right:60px;
             	}
             	
             	.brandname
             	{
             		display:flex;
             		flex-direction: column;

             	}
             	#subdetails
             	{
             		margin-right:10px;
             	}
             	.quantity
             	{
             		margin-left:10px;
             	}
             	#total
             	{
             		float:right;
             	}
             	@media (max-width:425px)
             	{
             		#first,#sec,#third
             	{

             		margin:5px;
             	}

                 .container
             	{
             		width:560px;
             		margin-top:90px;
             		margin-bottom:30px;
             		padding:5px;
             		margin-left:10px;
             		margin-right:15px;
             		
             	}
             	#brand
             	{
             		margin-right:40px;
             	}
             	
             	.content1
             	{
             		
             		
             		width:550px;
             		height:130px;
             		
             		padding:20px;
             	}
             	.content2
             	{
             		
             		width:560px;
             		
             		

             	}
             	.subcontent1
             	{
             		width:280px;
             		height:190px;
             		
             		padding:18px;
             		margin-right:10px;
             		
             	}
             	.subcontent2
             	{
             		width:300px;
             		height:250px;
             		
             		padding:18px;
             		margin-right:10px;
             		
             	}
             	.content4
             	{
             		
             		width:550px;
             		height:125px;
             		
             		padding:25px;
             	}
             	.content5
             	{
             		
             		width:550px;
             		height:135px;
             		
             		padding:25px;

             	}
             	.content3
             	{
             		
             		width:550px;
             		height:175px;
             		
             		padding:5px;
             	}
             	#subdetails
             	{
             		margin-right:5px;
             	}
             	.quantity
             	{
             		margin-left:8px;
             	}

             	}
             	@media (max-width:375px)
             	{
             		.container
             	{
             		
             		
             		margin-top:140px;
             		margin-bottom:20px;
             		
             		
             	}

             	}
             	@media (max-width:320px)
             	{
             		.container
             	{
             		
             		
             		margin-top:200px;
             		margin-bottom:20px;
             		
             		
             	}
             	#first,#sec,#third
             	{

             		margin:5px;
             	}
             	

             	}





             </style>
</head>
<body>
	<div class="container">
		<div class="heading">
			 <img src="https://start-upmall.com/home_images/Logo.png" height="30" alt="not supported" >
			 
		</div><br>
		<div class="content1">
			<p> Dear User,<br><br>

           We would like to inform you that your order from start-upmall.com is confirmed. Once , we will get back to you soon.</p>
		</div>
		<div class="content2">
			<div class="subcontent1">
				<p>
				<p class="bold">Shipment Details:</p> 
                Order ID: 2860225-1_0908 <br> <br>
               </p>
			</div>
			<div class="subcontent2">
				
				<p> <p class="bold">Delivery Address:</p> 

               
</p>
			</div>
		</div>
		<div class="content3">
			<p class="tops"> Shipment Details </p>
			<div class="details">';
			foreach($product as $products){
				$msg.='<div class="brandname">
			<p class="bold" id="brand"> <br> </p>
			<p id="subdetails">'.$products->product_name .'</p>
			<br> <p class="bold"> </p> Total Amount</div>
			<div class="brandname">
			<p class="bold" id="first"> Qty </p>
			<p class="quantity"> '.$products->quantity .'</p></div>
			<div class="brandname">
			<p class="bold" id="sec"> Price </p>
			<p class="quantity">'.$products->mrp .'</p></div>
			<div class="brandname">

			<p class="bold" id="third"> Sub total </p>';
			}
			$msg.='<p class="bold"id="total">'.$cartsumvalue[0].'</p></div>

		</div>
		</div>
		<div class="content4">
			<p><span class="bold">Note :</span> You can refuse to accept shipment if the outer packaging is tempered/damaged/torn/pressed/disturbed. Please mention the same on the POD slip. For questions, you can reach out to us at support@shiprocket.in.
			</p>
		</div>
		<div class="content5">
		<p>	Best Regards! <br> 
<p class="bold">Start-Up Mall Team</p>
This is a system generated message </p>
		</div>
	</div>
</body>
</html>
';
	   $subject='Thank you For Shopping With Us!';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($receiver_email,$subject,$msg,$headers))
         return redirect()->route('paysucess');
    }
}