<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class LoginUserController extends Controller
{
	public function userlogin(Request $request)
    {
        return view('user.loginuser');
    }
    public function checkuserLogin(Request $request)
    {
   
    	
    	$otp2=$request->otp2;
    	$status=$request->status;
    	$otp=$request->mob;
    	$mobilee=$request->mobilee;
    	$name=$request->name;
		$created_at=date('d-m-Y h:i a');
		 
		 switch($status)
		 {
			 case "1":
		       $checkuserLogin = DB::table('user_data')
    	                   ->where('user_phone',$mobilee)
    	                   ->first();
				
						   
						  if($checkuserLogin)
						   {
							
		 	   $otp=rand(100000,999999);
		     session::put('1otp',$otp);
		     session::put('user_name',$checkuserLogin->user_name);
		     session::put('user_mobile',$checkuserLogin->user_phone);
		     session::put('id',$checkuserLogin->id);
			 
	$username="sendriyafarms";
$password ="Qwe@1234";
$number=$mobilee;
$sender="RHTSMS";
$message="Welcome to Start-upmall.Your Otp for mobile verification is :".$otp;
$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//echo $curl_scraped_page = curl_exec($ch);
curl_exec($ch);

curl_close($ch); 
return response()->json(array("status"=> 2,"otp"=>$otp), 200);
						   }
						   else{
						   $otp=rand(100000,999999);
		     session::put('1otp',$otp);
	
$username="sendriyafarms";
$password ="Qwe@1234";
$number=$request->mobilee;
 session::put('user_mobile',$mobilee);
$sender="RHTSMS";
$message="Welcome to Start-upmall.Your Otp for mobile verification is :".$otp;
$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//echo $curl_scraped_page = curl_exec($ch);
curl_exec($ch);
curl_close($ch); 
return response()->json(array("status"=> 3,"otp"=>$otp), 200);
						   }
                          break; 
		case "4":
		$otp2=session::get('1otp');
		if($otp2==$otp)
			{
				
				$count=DB::table('cart')->where('user_id', session::get('id'))->sum('quantity');
				session::put('cartcount',$count);
			return response()->json(array('var'=>'','status'=> 5,'msg'=>'success'), 200);
			}
        else
		{
	         return response()->json(array("status"=> 6,"var"=>$otp,"msg"=>'Invalid Otp'), 200);
            }
         break;
		 case "5":
		$otp2=session::get('1otp');
		if($otp2==$otp)
			{
			return response()->json(array('var'=>'','status'=> 7,'msg'=>'success'), 200);
			}
        else
		{	         return response()->json(array("status"=> 6,"var"=>$otp,"msg"=>'Invalid Otp'), 200);
            }
         break;
		case "8":
		 
		 {
			
			 session::put('user_name',$name);
		   $mobilee=  session::get('user_mobile');
			 
			 
			 $insert=DB::table('user_data')
			        ->insertGetId(['user_phone'=>$mobilee,'user_name'=>$name]);
					 session::put('id',$insert);
session::put('cartcount',0);					 
					 return response()->json(array("status"=> 5,"msg"=>'Success',"cartcount"=>0), 200);
		 }
        break;
      }
   }
   
}