<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class AssignHomecateController extends Controller
{
    public function assignhomecat(Request $request)
    {
        if(Session::has('cityadmin'))
        {
            $cityadmin_email=Session::get('cityadmin');
        	
        	$homecat_id=$request->id;
        	
        	$homecat=DB::table('homecat')
            ->where('homecat_id',$homecat_id)
            ->first();
            
            $cityadmin=DB::table('cityadmin')
            ->where('cityadmin_email',$cityadmin_email)
            ->first();
            
            $assigned_categories=DB::table('assign_homecat')
            ->where('homecat_id',$homecat_id)
            ->get();
            
            $assigned_categoroy_list=DB::table('assign_homecat')
            ->join('tbl_category', 'assign_homecat.cat_id', '=', 'tbl_category.category_id')
            ->where('homecat_id',$homecat_id)
            ->get();
            
            if(count($assigned_categoroy_list)>0){
                foreach($assigned_categories as $assigned_categoroy_id)
                {
                    $aci[]=$assigned_categoroy_id->cat_id;
                }
            }
            else
            {
                $aci=array();
            }
            
            
            $cityadminCategory = DB::table('tbl_category')
                             ->where('cityadmin_id',$cityadmin->cityadmin_id)
        			         ->get();
            return view('cityadmin.homecate.assignhomecate',compact("cityadminCategory", "cityadmin_email", "cityadmin","homecat","aci","assigned_categoroy_list"));
        }
	else
	    {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	    }
    }
    
    public function InsertAssignHomeCat(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        $this->validate(
            $request,
                [
                    'selectedcat' => 'required',
                ],
                [
                    'selectedcat.required' => 'Please Select Atleast One Category.',
                ]
        );
       
        $homecat_id = $request->homecat_id;
        $selectedcat = $request->selectedcat;
        foreach($selectedcat as $data)
        {
            $insertCategory = DB::table('assign_homecat')
                            ->insert([
                                'homecat_id'=>$homecat_id,
                                'cat_id'=>$data,
                            ]);
        }
        
        if($insertCategory){
            return redirect()->back()->withErrors('Home Category Assign Successfully');
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
    
     public function InsertCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
       
        $category_name = $request->category_name;
        $cityadmin_id = $request->cityadmin_id;
        $order = $request->category_order;
        $status=$request->category_status;
         //return redirect()->back();
        $homeCategory = DB::table('homecat')
    	                 ->where('city_adminid', $cityadmin_id)
    			         ->get();
    			         
    if(count($homeCategory) >= 10){		         
    	return redirect()->back()->withErrors("Can Not Add More Then 10");
    }
    if($request->category_status=="")
    {
        $status =0 ;
    }
        
    $this->validate(
        $request,
            [
                'category_name' => 'required',
                'category_order' => 'required',
            ],
            [
                'category_name.required' => 'Enter category name.',
                'category_order.required' => 'Enter Order Of Home Category.',
            ]
    );

        $insertCategory = DB::table('homecat')
                            ->insert([
                                'city_adminid'=>$cityadmin_id,
                                'homecat_name'=>$category_name,
                                'order'=>$order,
                                'homecat_status'=>$status,
                            ]);
        
        if($insertCategory){
            return redirect()->back()->withErrors('Home Category added successfully');
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
    
    
    public function DeleteAssignhomecat(Request $request)
    {
        if(Session::has('cityadmin'))
        {
            $assign_id_id=$request->id;
        
        	$delete=DB::table('assign_homecat')->where('assign_id',$assign_id_id)->delete();
            if($delete)
            {
             
                return redirect()->back()->withErrors('Delete Successfully');
    
            }
            else
            {
               return redirect()->back()->withErrors('Unsuccessfull delete'); 
            }
		}
		else
			 {
				return redirect()->route('cityadminlogin')->withErrors('please login first');
			 }

    }

}