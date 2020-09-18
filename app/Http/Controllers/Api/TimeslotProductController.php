<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Hash;


class TimeslotProductController extends Controller
{
    
    public function TimeslotProductController(Request $request)
    {
    	$cityadmin_id = $request->cityadmin_id;
        $type = $request->type;
                
    	

    	if($type=="1"){
    		    $typecheck = DB::table('product')
    	                ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
    	                ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    					->where('tbl_category.cityadmin_id', $cityadmin_id)
    					->where('product.time_slote', $type)
    					->get();
    		    if(count($typecheck)>0)
    		    {
        			$message = array('status'=>'1', 'message'=>'Data Found', 'data'=>$typecheck);
    		    }
    		    else
    		    {
    		        $message = array('status'=>'0', 'message'=>'Data Not Found', 'data'=>[]);
    		    }
    	
    	}
    	elseif($type=="2"){
    	        $typecheck = DB::table('product')
    	                ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
    	                ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    					->where('tbl_category.cityadmin_id', $cityadmin_id)
    					->where('product.time_slote', $type)
    					->get();
    		                        
    		if(count($typecheck)>0)
    		    {
        			$message = array('status'=>'1', 'message'=>'Data Found', 'data'=>$typecheck);
    		    }
    		    else
    		    {
    		        $message = array('status'=>'0', 'message'=>'Data Not Found', 'data'=>[]);
    		    }
    	}
    	else{
    		$message = array('status'=>'0', 'message'=>'This Type Not Available', 'data'=>[]);
    	}
    	return $message;
    }
}