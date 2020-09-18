<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;


class MemberController extends Controller
{
  
    public function MemberPlanList(Request $request)
    {
        $plan = DB::table('membership_plan')
        		   ->get();

        if(count($plan)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$plan);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }
    }
    
    public function MemberPlanPurchase(Request $request)
    {
        $user_id=$request->user_id;
        $plan_id=$request->plan_id;
        $date = date('Y-m-d H:i:s');
        
        $plan = DB::table('membership_plan')
                    ->where('plan_id', $plan_id)
        		    ->first();
        		    
        $plan_days=$plan->plan_day;
        
        $checkMember = DB::table('member')
                         ->where('user_id', $user_id)
                         ->whereDate('end_date', '>=', $date)
                         ->orderBy('member_id', 'DESC')
                         ->first();
                         
        if($checkMember)
        {
            $start_date=$checkMember->end_date;
        }
        else
        {
            $start_date=date('Y-m-d H:i:s');
        }
        
        $date = strtotime($start_date);
        $date = strtotime("+".$plan_days." day", $date);
        $end_date= date('Y-m-d H:i:s', $date);
        
        $insertUser = DB::table('member')
    						->insertGetId([
    							'user_id'=>$user_id,
    							'plan_id'=>$plan_id,
    							'start_date'=>$start_date,
    							'end_date'=>$end_date,
    						]);
    						
    	if($insertUser)
    	{
    	    $message = array('status'=>'1', 'message'=>'Membership Purchase Successfully',);
    	}
    	else
    	{
    	    $message = array('status'=>'0', 'message'=>'Something Wents Wrong',);
    	}
    	
    	return $message;
    }
    
    
}    