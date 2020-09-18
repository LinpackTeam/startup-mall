<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use carbon\carbon;

class collectcashController extends Controller
{
       public function cashrequest(Request $request)
    {   
        $cityadmin_id= $request->cityadmin_id; 
        $user_id= $request->user_id;
        $amount= $request->amount;
        $date_of_collection = $request->date_of_collection;
        $created_at = carbon::now();
        $cashrequest = DB::table('cash_recharge')
                   ->insert(['user_id'=>$user_id,
                   'cityadmin_id'=>$cityadmin_id,
                    'amount'=>$amount,
                    'date_of_collection'=>$date_of_collection,
                    'created_at'=>$created_at]);

        if($cashrequest){
        	$message = array('status'=>'1', 'message'=>'successfully send your request', 'data'=>$cashrequest);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }
    }
    
    
    
    
    
}
