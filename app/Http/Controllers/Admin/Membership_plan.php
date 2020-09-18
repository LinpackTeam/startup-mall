<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class Membership_plan extends Controller
{
    public function all_plan(Request $request)
    {
    	

        $admin_email=Session::get('admin');
        
        $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
        $city= DB::table('city')
    	 	    ->get();
    	 	    
    	$membership_plan=DB::table('membership_plan')
    	 	    ->get();
    	         return view('admin.membership_plan.show_plan',compact("admin_email","city","admin","membership_plan"));



    }
    public function AddPlan(Request $request)
    {
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	return view('admin.membership_plan.add_plan',compact("admin_email","admin"));

    }
    public function InsertPlan(Request $request)
    {
        
        $this->validate(
            $request,
                [
                    'plan_name' => 'required',
                    'days' => 'required',
                    'description'=>'required',
                    'plan_price'=>'required',
                ],
                [
                    'plan_name.required' => 'Enter city name.',
                    'days.required' => 'Enter Days',
                    'description.required' => 'Enter Description About Plan.',
                    'plan_price.required' => 'Enter Plan Price'
                ]
        );
    	$plan_name=$request->plan_name;
    	$days=$request->days;
        $description=$request->description;
        $plan_price=$request->plan_price;

      $insert = DB::table('membership_plan')
    				->insert(['plan_name'=>$plan_name, 'plan_day'=>$days,'plan_price'=>$plan_price,'plan_subscription'=>$description]);
    if($insert){
     return redirect()->back()->withErrors('successfully');
    }
    else
    {
        return redirect()->back()->withErrors('Something Wents Wrong');
    }
}
     
    public function EditPlan(Request $request)
{
	 $admin_email=Session::get('admin');
	 $Plan_id=$request->id;
	$membership_plan=DB::table('membership_plan')
	            ->where('plan_id',$Plan_id)
    	 	    ->first();
     $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
	 return view('admin.membership_plan.update_plan',compact("admin_email","membership_plan","admin"));
}
public function UpdatePlan(Request $request)
{
    $this->validate(
            $request,
                [
                    'plan_name' => 'required',
                    'days' => 'required',
                    'description'=>'required',
                    'plan_price'=>'required',
                ],
                [
                    'plan_name.required' => 'Enter city name.',
                    'days.required' => 'Enter Days',
                    'description.required' => 'Enter Description About Plan.',
                    'plan_price.required' => 'Enter Plan Price'
                ]
        );
        
        $plan_name=$request->plan_name;
    	$days=$request->days;
        $description=$request->description;
        $plan_id = $request->plan_id;
        $plan_price=$request->plan_price;

        $update = DB::table('membership_plan')
                                ->where('plan_id', $plan_id)
                                ->update(['plan_name'=>$plan_name, 'plan_day'=>$days,'plan_price'=>$plan_price,'plan_subscription'=>$description]);

        if($update){
            return redirect()->back()->withErrors(' Updated Successfully');
        }
        else{
            return redirect()->back()->withErrors("Something Wents Wrong.");
        }
    }
    
    public function DeletePaln(Request $request)
    {
        $plan_id=$request->id;

    	$delete=DB::table('membership_plan')->where('plan_id',$plan_id)->delete();
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

