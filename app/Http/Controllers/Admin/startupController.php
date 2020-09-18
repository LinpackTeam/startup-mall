<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class startupController extends Controller
{
    public function registered(Request $request)
    {
                $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('form_data')
                         ->where('status','Registered')
    	 		          ->get();
    	         return view('admin.startup.registered',compact("admin_email","product","admin"));
    }
  public function issue_verification(Request $request)
    {
                $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('form_data')
                         ->where('status','Issue In Verification')
    	 		          ->get();
    	         return view('admin.startup.product_added',compact("admin_email","product","admin"));
}  
public function verification_success(Request $request)
    {
    
         $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('form_data')
                         ->where('status','Verification Success')
    	 		          ->get();           
        return view('admin.startup.product_added',compact("admin_email","product","admin"));
    }

 public function product_added(Request $request)
    {
    
         $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $product= DB::table('form_data')
                         ->where('status','Product Added')
    	 		          ->get();          
        return view('admin.startup.product_added',compact("admin_email","product","admin"));
    }
	
	public function reject(Request $request)
    {
		$startup_name=Session::get('startup_name');
		$email=Session::get('startup_email');
    //$email=DB::table('form_data')->where('id',$product_id)->first()->email;
    //$startup_name=DB::table('form_data')->where('id',$product_id)->first()->name_startup;
    $product_id = $request->id;
    $product= DB::table('form_data')
            ->where('startup_id', $product_id)
                 ->update(['status'=>'Issue In Verification']);
    if($product){
		$msg='<!DOCTYPE html>
<html>
    <head>
        <title>Issues-RegForm</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
   <body style="font-family:"Balsamiq Sans", cursive">
        <div class="container">
           <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
               <img src="'.url("public/email_images/issues_verification.jpg").'" class="img-responsive thumbnail"> 
            <p> Hi '.$startup_name.',</p><br>

            <p>Your application is under verification and we have found some issues in the following points of your form:<br>

                <i>(List out the issues pointwise)</i></p><br>
            <p>Kindly upload the necessary documents to move your application forward.</p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
            
               
             <img src="'.url("public/email_images/Logo.png").'" height="30">
             <br><br>
                <i>â€œ90% start-ups fail in our country within the first 5 years. Let us pledge to take down that number as low as we can
â€</i>
           
           </div>
        </div>
    </body>
</html>


';
    $subject='Unsuccessful Verification';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('Rejected Successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
    }
         
public function accept(Request $request)
    {
		$startup_name=Session::get('startup_name');
		$email=Session::get('startup_email');
    $product_id = $request->id;
       $product= DB::table('form_data')
            ->where('startup_id', $product_id)
                 ->update(['status'=>'Verification Success']);
       if($product){
		   
		$msg='<!DOCTYPE html>
<html>
    <head>
        <title>Success-RegForm</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
     <body style="font-family:"Balsamiq Sans", cursive">
        <div class="container">
           <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
               <img src="'.url("public/email_images/success_verification.jpg").'" class="img-responsive thumbnail"> 
            <p> Hi '.$startup_name.',</p><br>

            <p>Congratulations.!!!</p>

            <p>You have successfully completed the first step of the process.!!!</p>
            
            <p>Just one step to start your journey with us.</p>
            
            <p>The next round is your video assessment. We need to make sure that genuine start-ups are not paying the price for some disingenuous.</p>
            
            <p>We would be having a video inspection of your set-up through WhatsApp. It can be a plant, a pilot site, a small lab, an office or even a small room wherein the product is developed, produced or manufactured. Also, you need to make sure that you have all the required licenses for manufacturing and selling of your product.</p>

            <p>In the next 24-48 hours, we would be sending you 2 dates with time for your inspection. The date would be within 7 days of submission of your application. You can select any one of the 2 dates. After selection of date, you would receive a call 5 minutes before the inspection.</p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
            
                   <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
            <br><br>
        
                <i>â€œLetâ€™s build a better country. Reduce the gap between the two segments, one which lives in â€œBharatâ€ and the other which lives in â€œIndiaâ€ for a better tomorrow.â€</i>
           
            </div>
        </div>
    </body>
</html>


';
    $subject='Successful Verification';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('Accepted Successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
    }
    public function ViewProduct(Request $request)
    {
    
         $product_id = $request->id;
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $product= DB::table('form_data')
                 ->where('startup_id', $product_id)
                ->get();
        $image =  DB::table('images')
                ->where('startup_id', $product_id)
                ->get();           
        return view('admin.startup.viewstartup',compact("admin_email","product","admin","image"));
    }
} 
    
    