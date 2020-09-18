<?php

namespace App\Http\Controllers\resource_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class resourceController extends Controller
{
    
    public function newstartup(Request $request)
        {
                $admin_email=Session::get('resource_team');
			   
      
                    
    	         $product= DB::table('form_data')
                         ->where('status','Verification Success')
    	 		          ->get();
    	         return view('resource_team.startup.startups',compact("admin_email","product"));
    }		
    	 
    public function dateallocated(Request $request)
      {
               $admin_email=Session::get('resource_team');
        
                   
    	         $product= DB::table('form_data')
                        ->where('status','Date Allocated')
    	 		          ->get();
    	         return view('resource_team.startup.dateallocate',compact("admin_email","product"));
    }	
  public function verifiedstartup(Request $request)
    {
                $admin_email=Session::get('resource_team');
        
                    
    	         $product= DB::table('form_data')
                         ->where('status','Vedio Assessment Success')
    	 		          ->get();
    	         return view('resource_team.startup.verified',compact("admin_email","product"));
    }
public function ViewProduct(Request $request)
    {
    
        $product_id = $request->id;
        
        $product= DB::table('form_data')
                 ->where('startup_id', $product_id)
                ->get();
        $image =  DB::table('images')
                ->where('startup_id', $product_id)
                ->get();           
        return view('resource_team.startup.view',compact("product","image"));
    }
public function rejectstartup(Request $request)

	{
    $product_id = $request->id;
	$email=DB::table('form_data')->where('startup_id',$product_id)->first()->email;
			$startup_name=DB::table('form_data')->where('startup_id',$product_id)->first()->name_startup;
    $product= DB::table('form_data')
            ->where('startup_id', $product_id)
                 ->update(['status'=>'Video Assessment Issue']);
    if($product){
		$msg='<!DOCTYPE html>
<html>
    <head>
        <title>Unsuccessfull</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
               <img src=""'.url("public/email_images/Sliderd.jpg").' class="img-responsive thumbnail">
            <p> Hi '.$startup_name.',</p><br>

            <p>We regret to inform you that you have not cleared the video assessment.</p>

            <p>We try to be honest with you to provide you the best feedback from the screening team.</p>
            <p>The feedback we received from them is as follows:</p><br>
            <p>â€œ____________________________â€</p><br>
            <p>You can still work upon the feedback and apply again. There is no limit to the number of times a start-up can apply. Together we will grow and make things better.</p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
               <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100"> <br><br>
               
                <i style="text-align:center">â€œThose who try often fail and those who fail eventually win. Those, who, for the fear of failure do not try are the ones who lose the most because life is short and it is better to live with passion than to pass away with regretâ€</i>
        </div>
              </div>
               
    </body>
</html>


';
    $subject='Issue in Vedio Assessment';

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
public function acceptstartup(Request $request)
{
	
            $product_id = $request->id;
			$email=DB::table('form_data')->where('startup_id',$product_id)->first()->email;
			$startup_name=DB::table('form_data')->where('startup_id',$product_id)->first()->name_startup;
			
    	        $product= DB::table('form_data')
            ->where('startup_id', $product_id)
                 ->update(['status'=>'Video Assessment Success']);
    if($product){
		$msg='<!DOCTYPE html>
<html>
    <head>
        <title>Successful</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
               <img src="'.url("public/email_images/success_verification.jpg").'" class="img-responsive thumbnail" height="100px">
                
            <h4 style="color: #070F64"> Hi '.$startup_name.',</h4><br>

            <p>Itâ€™s time to fire all engines and start your journey with the â€œStart-up mall.â€
</p>

            <p>Congratulations on your successful assessment.</p>
            <p>You can now start adding products to your portfolio.</p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
               
                 <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
             
            <center>
            <div>
                 <br>
                <i>â€œA mission well begun is half doneâ€ </i>
            </div>
            </center>
             </div>
        </div>
    </body>
</html>



';
    $subject='Successful Vedio Assessment';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email=$email; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('Accepted Successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
    }
public function Allocatedate(Request $request)
{
	$product_id = $request->startup_id;
	$name_startup = $request->startup_name;
	$email = $request->email;
    $product= DB::table('form_data')
                 ->get();	
	$id=Session::get('resource_team');
	$res_id=DB::table('resource_team')
	           ->where('login_id',$id)
			   ->first();
	$date1=$request->a_date1;
	$date2=$request->a_date2;
	$insert= DB::table('start_up_screening')
	        ->insert(['startup_id'=>$product_id,'res 1'=>$res_id->id,'date'=>$date1,'date_alt'=>$date2,'status'=>'assigned']);
	$update= DB::table('form_data')
	->where('startup_id',$product_id)
	        ->update(['status'=>'Date Allocated']);
			
	if($insert){
		 $msg = '
<!DOCTYPE html>
<html>
    <head>
        <title>Form-submitted</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
               <img src="https://start-upmall.com/assets/img/Registration-Successful.png" class="img-responsive thumbnail"> 
            <p> Hi '.$name_startup.', Team</p><br>

            <p>One More step away from onboarding.</p>

            <p>Our Screeing team will review your start-up by video assessment. Please <a href="https://start-upmall.com/adminbykiran/admin/startup/date/'.$product_id.'">click here</a> to select video assessment date and time </p><br>
Thanks and Regards,<br>
Admin <br>
(+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
              <img src="https://start-upmall.com/assets/img/Logo.png" class="img-responsive" width="100"> <br><br>
           
                <i>“Start-ups are the present and the future of our country”</i>
            </div>
        </div>
    </body>
</html>';
$headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n" ;
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//$receiver_email=$email;
if(mail($email,"Date Allocation For Vedio Assessment",$msg,$headers))
return redirect()->back()->withErrors('Alloted Successfully');
else
 return redirect()->back()->withErrors('try again');
}
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
} 
public function reason_rejection(Request $request)
{
	$product_id = $request->startup_id;
	$product= DB::table('form_data')
                 ->get();
	$reason=$request->reason;
	$update= DB::table('form_data')
	->where('startup_id',$product_id)
	        ->update(['status'=>'Resource Rejected','reason_for_rejection'=>$reason]);
			
	if($update){
            return view('resource_team.startup.startups',compact("product"));
        }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
} 
public function ViewProductallocate(Request $request)
    {
    
        $product_id = $request->id;
        
        $product= DB::table('form_data')
                 ->where('startup_id', $product_id)
                ->get();
        $image =  DB::table('images')
                ->where('startup_id', $product_id)
                ->get();           
        return view('resource_team.startup.viewallocate',compact("product","image"));
    }
}