<?php

namespace App\Http\Controllers\Resource_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class LoginresourceController extends Controller
{
	public function resourceteamlogin(Request $request)
    {
        return view('resource_team.loginresource');
    }
    public function checkresourceLogin(Request $request)
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
    	$checkcityadminLogin = DB::table('resource_team')
    	                   ->where('login_id',$resource_email)
    	                   ->first();


    	if($checkcityadminLogin){

         if(Hash::check($resource_pass,$checkcityadminLogin->password)){
           session::put('resource_team',$checkcityadminLogin->login_id);
		   session::put('resource_name',$checkcityadminLogin->name);
           return redirect()->route('newstartup');
         }
         else
         {
         	return redirect()->route('resourceteamlogin')->withErrors('wrong password');
         }
    	}
    	else
    	{
             return redirect()->route('resourceteamlogin')->withErrors('invalid email and password');
    	}

    }
    
}
