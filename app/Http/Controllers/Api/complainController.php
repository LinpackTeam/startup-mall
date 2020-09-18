<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class complainController extends Controller
{
    
     public function showcomplain(Request $request)
    {   
        $complain = DB::table('complains')
        		   ->get();

        if(count($complain)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$complain);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
    
    public function showcompleted(Request $request)
    {
      $cityadmin_id= $request->cityadmin_id;
      $data=DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('delivery_boy', 'completed_orders.delivery_boy_id', '=', 'delivery_boy.delivery_boy_id')
    	                    ->select('completed_orders.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.*', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type','delivery_boy.delivery_boy_name','delivery_boy.delivery_boy_id')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
                            ->get();
                            
      if(count($data)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$data);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }                        
                            
    
    }
    
    
    
     public function report_issue(Request $request)
    {
        $delivery_boy_id = $request-> delivery_boy_id;
        $cityadmin_id = $request-> cityadmin_id;
        $completed_id = $request-> completed_id;
        $complain_id = $request-> complain_id;
        
        $check = DB::table('order_complains')
              ->where('completed_id', $completed_id)
              ->get();
        if(count($check)>0){
            $message = array('status'=>'1', 'message'=>'already_complained');
        	return $message;
        }      
        else{
        $insert = DB::table('order_complains')
               ->insert(['cityadmin_id'=> $cityadmin_id,
               'completed_id' => $completed_id,
               'complain_id' => $complain_id,
               'delivery_boy_id' => $delivery_boy_id]);
               
        if($insert){
        	$message = array('status'=>'1', 'message'=>'complain sent', 'data'=>$insert);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data inserting failed', 'data'=>[]);
        	return $message;
        } 
        }
    }
}