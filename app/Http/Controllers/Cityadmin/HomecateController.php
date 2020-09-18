<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class HomecateController extends Controller
{
    public function allhomecate(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
    	
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();	
        
        $cityadminhomeCategory = DB::table('homecat')
                         ->where('city_adminid',$cityadmin->cityadmin_id)
    			         ->get();
        return view('cityadmin.homecate.show_homecategory',compact("cityadminhomeCategory", "cityadmin_email", "cityadmin"));
     }
	else
	 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }	
    }
    
    public function AddCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        $cityadmin_email=Session::get('cityadmin');
    	
    		         
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        return view('cityadmin.homecate.add_homecategory',compact("cityadmin_email","cityadmin"));
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
    
    public function EditCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        
    	$category_id = $request->id;

    	$category = DB::table('homecat')
        	          ->where('homecat_id', $category_id)
        			  ->first();
        $cityadmin_email=Session::get('cityadmin');
        	
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('cityadmin.homecate.update_homecategory',compact("category","cityadmin_email","cityadmin"));
		 }
	else
		 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
		 }
    }

    public function UpdateCategory(Request $request)
    {
     if(Session::has('cityadmin'))
     {
         //return redirect()->back();
          $id = $request->id;
        $category_name = $request->category_name;
        $cityadmin_id = $request->cityadmin_id;
        $order = $request->category_order;
        $status=$request->category_status;
         //return redirect()->back();
        $homeCategory = DB::table('homecat')
    	                 ->where('city_adminid', $cityadmin_id)
    			         ->get();
        
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
        $updateCategory = DB::table('homecat')
                            ->where('homecat_id', $id)
                            ->update([
                                'homecat_name'=>$category_name,
                                'order'=>$order,
                                'homecat_status'=>$status,
                            ]);
        
        if($updateCategory){
            return redirect()->back()->withErrors('Home Category updated successfully');
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
    
    
    
     public function DeleteCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        $category_id=$request->category_id;

        $getfile=DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->first();

        $category_image=$getfile->category_image;

    	$delete=DB::table('tbl_category')->where('category_id',$request->category_id)->delete();
        if($delete)
        {
        
            if(file_exists($category_image)){
                unlink($category_image);
            }
         
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