<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class cityController extends Controller
{
    
     public function showcity(Request $request)
    {   
        $city = DB::table('city')
              ->join('cityadmin', 'city.city_id', '=','cityadmin.city_id')
        		   ->get();

        if(count($city)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$city);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
  
      public function showarea(Request $request)
    {   
        
        $city_id= $request->city_id;
        $area = DB::table('area')
                  ->where('city_id', $city_id)
        		   ->get();

        if(count($area)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$area);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
  
  
     public function city(Request $request)
    {   
        $city_id= $request->city_id;
        $cityadmin = DB::table('cityadmin')
                   ->where('city_id', $city_id)
        		   ->get();

        if(count($cityadmin)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$cityadmin);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
}