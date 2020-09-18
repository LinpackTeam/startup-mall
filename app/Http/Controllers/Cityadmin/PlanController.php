<?php

namespace App\Http\Controllers\cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function plan(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
    	$cityadminplan = DB::table('subscription_plans')
    			         ->get();
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();	
        return view('cityadmin.plan.show_plan',compact("cityadminplan", "cityadmin_email", "cityadmin"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    	
    }
    
     public function cityadminAddplan(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
    	$cityadminplan = DB::table('subscription_plans')
    			         ->get();
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        return view('cityadmin.plan.add_plan',compact("cityadminplan", "cityadmin_email", "cityadmin"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
     public function cityadminAddNewplan(Request $request)
    {
    if(Session::has('cityadmin'))
     {
        $plan_name = $request->plan_name;
		$days = $request->days;
		$description = $request->description;
		$skip_days = $request->skip_days;
        
        $this->validate(
            $request,
                [
                    'plan_name' => 'required',
					'days' => 'required',
                    'description' => 'required',
					'skip_days' => 'required'
                ],
                [
                    'plan_name.required' => 'Enter plan name.',
                    'days.required' => 'enter days.',
					'description.required' => 'enter description about your plan.',
					'skip_days.required' => 'enter skip days.',
                ]
        );

        

        $insertplan = DB::table('subscription_plans')
                            ->insert([
                                'plans'=>$plan_name,
                                'days'=>$days,
                                'description'=>$description,
                                'skip_days'=>$skip_days
                            ]);
        
        if($insertplan){
            return redirect()->back()->withErrors('plan added successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
    public function cityadminEditplan(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        //$title = "Edit plan";
        
    	$plan_id = $request->plan_id;

    	$plan = DB::table('subscription_plans')
        	          ->where('plan_id', $plan_id)
        			  ->first();
        $cityadmin_email=Session::get('cityadmin');
        
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('cityadmin.plan.update_plan',compact("plan","cityadmin_email","cityadmin"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }

    public function cityadminUpdateplan(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        //return redirect()->back();
        
        $plan_id = $request->plan_id;
        $plan_name = $request->plan_name;
		$days = $request->days;
		$description = $request->description;
		$skip_days = $request->skip_days;
        $getplan = DB::table('subscription_plans')
                    ->where('plan_id',$plan_id)
                    ->first();

        $updateplan = DB::table('subscription_plans')
                            ->where('plan_id', $plan_id)
                            ->update([
                                'plans'=>$plan_name,
                                'days'=>$days,
                                'description'=>$description,
                                'skip_days'=>$skip_days
                            ]);
        
        if($updateplan){
            return redirect()->back()->withErrors('plan updated successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
     public function cityadminDeleteplan(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $plan_id=$request->plan_id;

        $getfile=DB::table('subscription_plans')
                ->where('plan_id',$plan_id)
                ->first();

    	$delete=DB::table('subscription_plans')->where('plan_id',$request->plan_id)->delete();
        if($delete)
        { 
        return redirect()->back()->withErrors('delete successfully');
        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }

}