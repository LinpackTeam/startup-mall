<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Mail\otp;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class LoginController extends Controller
{
	public function cityadminlogin(Request $request)
    {
        return view('cityadmin.login');
    }
    public function checkcityadminLogin(Request $request)
    {
    	$cityadmin_email=$request->email;
    	$cityadmin_pass=$request->password;
    	$status=$request->status;
    	$otp2=$request->otp2;
    	$otp=$request->otp;
    	$mobilee=$request->mobilee;
    	$name=$request->name;
		 $created_at=date('d-m-Y h:i a');
		 

switch($status){
      case "1":
	  
    	$checkcityadminLogin = DB::table('cityadmin')
    	                   ->where('cityadmin_email',$cityadmin_email)
    	                   ->first();
						  if($checkcityadminLogin)
						   {
							session::put('Password_db',$checkcityadminLogin->cityadmin_pass);
							   
                      return response()->json(array('status'=> 3,'msg'=>'success'), 200);
                             
						   }
						   else
						   {
							      $otp=rand(100000,999999);
                  

Mail::to($cityadmin_email)->send(new otp($otp));                             


							  return response()->json(array("status"=> 2,"var"=>$otp), 200);
                            
						   }
						    break; 
		case "4":
            if($otp2==$otp)
			{
			return response()->json(array('var'=>'','status'=> 5,'msg'=>'success'), 200);	
			}	
            else
            {
	         return response()->json(array("status"=> 6,"var"=>$otp,"msg"=>'Invalid Otp'), 200);
            }	
        case "8":
		        $new_pass=Hash::make($cityadmin_pass);
        $insert = DB::table('cityadmin')
                  ->insertGetId(['cityadmin_name'=>$name,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $mobilee, 'cityadmin_pass'=>$new_pass,'created_at'=>$created_at]);
				   session::put('cityadmin',$cityadmin_email);
		$insert1=DB::table('temp_form_data')		
                      ->insert(['startup_id'=>$insert])	;
		   session::put('cityadmin_id',$insert);
		   session::put('startup_name',$name);
		   session::put('startup_email',$cityadmin_email);
          return response()->json(array('status'=> 12,'msg'=>'success'), 200);
break;		
case "11":

$pass_seesion=Session::get('Password_db');
             if(Hash::check($cityadmin_pass,$pass_seesion)){							
			     	  $cityadmin= DB::table('cityadmin')
    	                   ->where('cityadmin_email',$cityadmin_email)
    	                   ->first(); 
						     session::put('cityadmin',$cityadmin->cityadmin_email);
		  session::put('cityadmin_id',$cityadmin->city_id);
		   session::put('startup_name',$cityadmin->cityadmin_name);
		   session::put('startup_email',$cityadmin_email);
						   if($cityadmin->status==1){
		
		   return response()->json(array('status'=> 10,'msg'=>'success'), 200);	
						   }
else
{
	return response()->json(array('status'=> 12,'msg'=>'success'), 200);	
}	
			 }
			 else
				  return response()->json(array('status'=> 13,'msg'=>'Wrong Password'), 200);
			  
			  break;

    }
    
}
public function mobileotpsend(Request $request)
{

	$otp=rand(100000,999999);
		   session::put('1otp',$otp);
	
$username="sendriyafarms";
$password ="Qwe@1234";
$number=$request->mobilee;
$sender="RHTSMS";
$message="Welcome to Start-upmall. Hope your entrepreneurship journey is Successful.Your Otp for mobile verification is :".$otp;
 
$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//echo $curl_scraped_page = curl_exec($ch);
curl_exec($ch);

curl_close($ch); 

 return response()->json(array('msg'=>'success','number'=>$number), 200);
}
public function mobileotpcheck(Request $request)

{
	$mob=$request->mob;
	$value = Session::get('1otp');
	if((int)$mob==(int)$value)

return response()->json(array('msg'=>'success','status'=>8), 200);
else
return response()->json(array('msg'=>'success','status'=>21), 200);
}
}
