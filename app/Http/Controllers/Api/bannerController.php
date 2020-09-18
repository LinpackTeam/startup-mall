<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class bannerController extends Controller
{
  
     public function homebanner(Request $request)
    {   
        $cityadmin_id= $request->cityadmin_id;
        $bannerloc_id= 'home';
        $banner = DB::table('banner')
                   ->where('bannerloc_id',$bannerloc_id)
                   ->where('cityadmin_id', $cityadmin_id)
        		   ->get();

        if(count($banner)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$banner);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
    
    
    
      public function home2banner(Request $request)
    {   
        $cityadmin_id= $request->cityadmin_id;
        $bannerloc_id= 'home2';
        $banner = DB::table('banner')
                   ->where('bannerloc_id',$bannerloc_id)
                   ->where('cityadmin_id', $cityadmin_id)
        		   ->get();

        if(count($banner)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$banner);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }  
    
    
    
    public function catbanner(Request $request)
    {   
        $cityadmin_id= $request->cityadmin_id;
        $category_id= $request->category_id;
        $banner = DB::table('banner')
                   ->where('bannerloc_id',$category_id)
                   ->where('cityadmin_id', $cityadmin_id)
        		   ->get();

        if(count($banner)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$banner);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
}    