<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class PlanController extends Controller
{
    public function plan(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminplan = DB::table('subscription_plans')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();	
        return view('admin.plan.show_plan',compact("adminplan", "admin_email", "admin"));
    	
    }
    
     public function adminAddplan(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminplan = DB::table('subscription_plans')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        return view('admin.plan.add_plan',compact("adminplan", "admin_email", "admin"));
    }
    
     public function adminAddNewplan(Request $request)
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
    
    public function adminEditplan(Request $request)
    {
        //$title = "Edit plan";
        
    	$plan_id = $request->plan_id;

    	$plan = DB::table('subscription_plans')
        	          ->where('plan_id', $plan_id)
        			  ->first();
        $admin_email=Session::get('admin');
        
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('admin.plan.update_plan',compact("plan","admin_email","admin"));
    }

    public function adminUpdateplan(Request $request)
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
    
     public function adminDeleteplan(Request $request)
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

}