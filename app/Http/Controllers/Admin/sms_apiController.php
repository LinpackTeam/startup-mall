<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class sms_apiController extends Controller
{    
      public function edit_sms_api(Request $request)
    {
      if(Session::has('admin'))
       {
    	 $admin_email=Session::get('admin');
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();
    	   
    			
    	   $sms_api_key=  DB::table('sms_api')
    	              ->select('sms_api_key', 'sender_id')
                      ->first();
              $api_key = $sms_api_key->sms_api_key;
              $sender_id = $sms_api_key->sender_id;
              
            	return view('admin.sms_api', compact("admin_email", "admin", "api_key", "sender_id"));
            	
    			
    	
	 }
	else
	 {
	    return redirect()->route('adminlogin')->withErrors('please login first');
	 }
    }
    
    
    
      
      public function update_sms_api(Request $request)
    {
      if(Session::has('admin'))
     {
    	 $admin_email=Session::get('admin');
    
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();
          $sms_api_key = $request->sms_api_key;
          $sender_id= $request->sender_id;
          
        $update= DB::table('sms_api')
     		     ->update(['sms_api_key'=>$sms_api_key,
     		                 'sender_id'=>$sender_id]);
	
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