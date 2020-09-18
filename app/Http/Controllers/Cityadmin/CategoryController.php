<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
    	
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();	
        
        $cityadminCategory = DB::table('start_upcategories')
                         ->where('startup_id',$cityadmin->city_id)
    			         ->get();
        return view('cityadmin.category.show_cat',compact("cityadminCategory", "cityadmin_email", "cityadmin"));
     }
	else
	 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }	
    }
    
     public function cityadminAddCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        $cityadmin_email=Session::get('cityadmin');
    	$cityadminCategory = DB::table('tbl_category')
    			         ->get();
    	$homeCategory = DB::table('tbl_category')
    	                 ->where('home', 1)
    			         ->count();		         
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        return view('cityadmin.category.add_category',compact("cityadminCategory", "cityadmin_email","homeCategory", "cityadmin"));
     }
	else
	 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
     public function cityadminAddNewCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        //return redirect()->back();
        $category_name = $request->category_name;
        $cityadmin_id = $request->cityadmin_id;
        $homecat = $request->homecat;
        //$category_image = $request->category_image;
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        $date=date('d-m-Y');
         //return redirect()->back();
        $homeCategory = DB::table('tbl_category')
    	                 ->where('home', '1')
    			         ->get();
    			         
    if(count($homeCategory) < 3){		         
    			         
        if($homecat=="")
        {
            $homecat=0;
        }
    }
        else{
            $homecat=0;
        }
        
        $this->validate(
            $request,
                [
                    'category_name' => 'required',
                 
                ],
                [
                    'category_name.required' => 'Enter category name.',
                  
                ]
        );

        

        

        if($request->hasFile('category_image')){
            $category_image = $request->category_image;
            $fileName = $category_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $category_image->move('images/category/'.$date.'/', $fileName);
            $category_image = 'images/category/'.$date.'/'.$fileName;
        }
        else{
            $category_image = 'N/A';
        }

        $insertCategory = DB::table('tbl_category')
                            ->insert([
                                'cityadmin_id'=>$cityadmin_id,
                                'category_name'=>$category_name,
                                'category_image'=>$category_image,
                                'home'=>$homecat,
                                'created_at'=>$created_at,
                                'updated_at'=>$updated_at
                            ]);
        
        if($insertCategory){
            return redirect()->back()->withErrors('category added successfully');
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
    
    public function cityadminEditCategory(Request $request)
    {
     if(Session::has('cityadmin'))
      {
        
    	$category_id = $request->category_id;

    	$category = DB::table('tbl_category')
        	          ->where('category_id', $category_id)
        			  ->first();
        $cityadmin_email=Session::get('cityadmin');
        	
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('cityadmin.category.update_cat',compact("category","cityadmin_email","cityadmin"));
		 }
	else
		 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
		 }
    }

    public function cityadminUpdateCategory(Request $request)
    {
     if(Session::has('cityadmin'))
     {
         //return redirect()->back();
        $homeCategory = DB::table('tbl_category')
    	                 ->where('home', 1)
    			         ->get();	
        $category_id = $request->category_id;
        $category_name = $request->category_name;
        $cityadmin_id = $request->cityadmin_id;
        $homecat = $request->homecat;
        //$category_app = json_encode($request->category_app);
        $updated_at = Carbon::now();
        $date = date('d-m-Y');
        if(count($homeCategory) < 3){		         
    			         
        if($homecat=="")
        {
            $homecat=0;
        }
    }
        else{
            $homecat=0;
        }
        $this->validate(
            $request,
                [
                    'category_name' => 'required',
                    'category_image' => 'mimes:jpeg,png,jpg|max:400',
                    //'category_app' => 'required',
                ],
                [
                    'category_name.required' => 'Enter category name.',
                    'category_image.required' => 'Choose category icon.',
                    //'category_app.required' => 'select category app.',
                ]
        );

    	

        $getCategory = DB::table('tbl_category')
                    ->where('category_id',$category_id)
                    ->first();

        $image = $getCategory->category_image;

        if($request->hasFile('category_image')){
            if(file_exists($image)){
                unlink($image);
            }
            $category_image = $request->category_image;
            $fileName =$category_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $category_image->move('images/category/'.$date.'/', $fileName);
            $category_image = 'images/category/'.$date.'/'.$fileName;
        }
        else{
            $category_image = $getCategory->category_image;
        }
        $updateCategory = DB::table('tbl_category')
                            ->where('category_id', $category_id)
                            ->update([
                                 'cityadmin_id'=>$cityadmin_id,
                                'category_name'=>$category_name,
                                'category_image'=>$category_image,
                                'home'=>$homecat,
                                'updated_at'=>$updated_at
                            ]);
        
        if($updateCategory){
            return redirect()->back()->withErrors('category updated successfully');
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
    
    
    
     public function cityadminDeleteCategory(Request $request)
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