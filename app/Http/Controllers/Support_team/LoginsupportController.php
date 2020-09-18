<?php

namespace App\Http\Controllers\Support_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class LoginsupportController extends Controller
{
	public function supportteamlogin(Request $request)
    {
        return view('support_team.loginsupport');
    }
    public function checksupportLogin(Request $request)
    {
    	$resource_email=$request->login_id;
    	$resource_pass=$request->password;

    	$this->validate(
         $request,
         [
         		'login_id'=>'required',
         		'password'=>'required',
         ],
         [

         	'login_id.required'=>'Enter E-Mail',
         	'password.required'=>'Enter the password',
         ]

);
    	$checkcityadminLogin = DB::table('support_team')
    	                   ->where('login_id',$resource_email)
    	                   ->first();


    	if($checkcityadminLogin){

         if(Hash::check($resource_pass,$checkcityadminLogin->password)){
           session::put('support_team',$checkcityadminLogin->login_id);
		   session::put('support_name',$checkcityadminLogin->name);
           return redirect()->route('view-startup-support');
         }
         else
         {
         	return redirect()->route('supportteamlogin')->withErrors('wrong password');
         }
    	}
    	else
    	{
             return redirect()->route('supportteamlogin')->withErrors('invalid email and password');
    	}

    }
    
}
