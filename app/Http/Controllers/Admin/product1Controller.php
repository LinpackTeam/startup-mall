<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class product1Controller extends Controller
{
    public function pendingproduct(Request $request)
    {
                $admin_email=Session::get('admin');
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('product')
                         ->where('status','pending_for_verification')
    	 		          ->get();
    	         return view('admin.product1.admin_pending',compact("admin_email","product","admin"));
    }
  public function approvedproduct(Request $request)
    {
                $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('product')
                        ->where('status','approved')
    	 		          ->get();
    	         return view('admin.product1.admin_approved',compact("admin_email","product","admin"));
}  
public function ViewProduct(Request $request)
    {
    
         $product_id = $request->id;
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
     $product= DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                 ->where('product_id', $product_id)
                ->get();
	    $tech=DB::table('technical_details')
		->where('product_id',$product_id)
                ->get(); 
        $image =  DB::table('product_img')
                ->where('product_id', $product_id)
                ->get();            
        return view('admin.product1.viewproductadmin',compact("admin_email","product","admin","image","tech"));
    }
public function rejectproduct(Request $request)
    {
		//$email=Session::get('startup_email');
    $product_id = $request->id;
	$startup_id = DB::table('product')
                    ->where('product_id', $product_id)
                    ->value('startup_id');
	$product_name = DB::table('product')
                    ->where('product_id', $product_id)
                    ->value('product_name');				
	 $startup_name = DB::table('form_data')
                   ->where('startup_id', $startup_id)
                   ->value('name_startup');
	 $email = DB::table('form_data')
                   ->where('startup_id', $startup_id)
                   ->value('email');
    $product=DB::table('product')
            ->where('product_id', $product_id)
                 ->update(['status'=>'issue_in_product']);
    if($product){
		  
		   $msg='
		   <!DOCTYPE html>
<html>
    <head>
        <title>Problem-product</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <style>
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
    <body style="font-family:Balsamiq Sans, cursive">
        <div class="container">
            <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
                <img src="'.url("public/email_images/Error.jpg").'" class="img-responsive">
                
            <h4 style="color: #070F64"> Hi '.$startup_name.',</h4><br>

            <p>We have found some discrepancies in the following points.</p><br>
            <p><i>Product Name : '.$product_name.'</i></p><br>
            <p>Kindly resolve them as soon as possible to begin your journey on Start-up mall.</p><br>
Thanks and Regards,<br>
Admin<br>
                (+91 9725148432)<br>
                (Ahmedabad)<br><br>
            
             <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="150">
             
            <center>
            <div class=" container col-xs-12">
                <i>â€œYour stature and growth and success depends on the size of the problem you solveâ€ </i>
            </div>
            </center>
                </div>
        </div>
    </body>
</html>

';
    $subject='Problem in Product';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('Product rejected successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
    }
         
public function acceptproduct(Request $request)
    {
		//$email=Session::get('startup_email');
    $product_id = $request->id;
	 $startup_id = DB::table('product')
	               
                    ->where('product_id', $product_id)
                    ->value('startup_id');
	 $startup_name = DB::table('form_data')
	
                   ->where('startup_id', $startup_id)
                   ->value('name_startup');
		 $email = DB::table('form_data')
                   ->where('startup_id', $startup_id)
                   ->value('email');	  
       $product= DB::table('product')
            ->where('product_id', $product_id)
                 ->update(['status'=>'approved']);
				
       if($product){
		   
		   $msg='
		   <!DOCTYPE html>
<html>
    <head>
        <title>Product-Live</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    <style>
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
  <body style="font-family:Balsamiq Sans, cursive">
        <div class="container">
            <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
               <img src="'.url("public/email_images/product_live.jpg").'" class="img-responsive thumbnail">
                
            <h4 style="color: #070F64"> Hi '.$startup_name.',</h4><br>
                <div class="col-sm-4 col-md-4">
                
                </div>
                 <div class="col-sm-8 col-md-8">
                <ul>
            
                </ul>
                </div>
                <div class="clearfix"></div>
            <h1 style="color:green">Congratulations.!!! </h1><br>

            <p>You are live on our portal.</p>
            <p>Now, you can manage your account and try to be the best in terms of product quality, service and timely delivery.</p>
            <p>Be as smooth as you can and your traction on the website can take you to the next level and you can draw the attention of some investors monitoring start-ups on our portal.</p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
               
                    <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
               
            <center>
            <div class=" container col-xs-12">
                <i>â€œThe one behind the wheels is the only one that mattersâ€</i>
            </div>
            </center>
                 </div>
        </div>
    </body>
</html>

';
    $subject='Product-Live';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('product accepted successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
    }
      
} 
    
    