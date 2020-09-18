<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class Fcm_Controller extends Controller
{    
      public function edit_fcm_api(Request $request)
    {
      if(Session::has('admin'))
       {
    	 $admin_email=Session::get('admin');
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();
    	   
    			
    	   $api_key=  DB::table('fcm_key')
    	              ->select('*')
                      ->first();
              $user_api_key = $api_key->user_app_key;
              $dboy_api_key = $api_key->dboy_app_key;
              
            	return view('admin.fcm_api', compact("admin_email", "admin", "user_api_key", "dboy_api_key"));
            	
    			
    	
	 }
	else
	 {
	    return redirect()->route('adminlogin')->withErrors('please login first');
	 }
    }
    
    
    
      
     public function update_fcm_api(Request $request)
    {
      if(Session::has('admin'))
     {
    	 $admin_email=Session::get('admin');
    
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();
          $user_key = $request->user_key;
          $dboy_id= $request->dboy_key;
          
        $update= DB::table('fcm_key')
     		     ->update(['user_app_key'=>$user_key,
     		                 'dboy_app_key'=>$dboy_id]);
	
     if($update){
            return redirect()->back()->withErrors('API key set');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
	 }
	else
	 {
	    return redirect()->route('adminlogin')->withErrors('please login first');
	 }
    }
    
}