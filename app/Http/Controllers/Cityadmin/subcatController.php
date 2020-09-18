<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class subcatController extends Controller
{
    public function subcat(Request $request)
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();

		
        $subcat= DB::table('subcat')
                ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                ->where('startup_id', $cityadmin->city_id)
                ->get();		
        return view('cityadmin.subcat.subcat',compact("cityadmin_email","subcat","cityadmin"));
    }
    
     public function Addsubcat(Request $request)
    {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $category= DB::table('start_upcategories')
                ->where('startup_id',$cityadmin->city_id)
                ->get();
         return view('cityadmin.subcat.addsubcat',compact("cityadmin_email","category","cityadmin"));
    }
    
    
        public function AddNewsubcat(Request $request)
    {
        
        $subcat_id=$request->id;
        $category_name=$request->category_name;
        $subcat_name=$request->subcat_name;
       
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');



        $insert = DB::table('subcat')
                  ->insert(['category_id'=>$category_name,'subcat_name'=>$subcat_name,'created_at'=>$created_at]);
     
     return redirect()->back()->withErrors('successfully');

    }
    
    public function Editsubcat(Request $request)
    {
    	
       $subcat_id=$request->id;
    	 $cityadmin_email=Session::get('cityadmin');
    	 
         $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email',$cityadmin_email)
                ->first();       
    	 $subcat= DB::table('subcat')
    	 		  ->where('subcat_id',$subcat_id)
    	 		  ->first();
    	 $category=DB::table('tbl_category')
    	        ->where('cityadmin_id',$cityadmin->cityadmin_id)
                ->get();		  
    	 return view('cityadmin.subcat.Editsubcat',compact("cityadmin_email","cityadmin","category","subcat_id","subcat"));


    }
    public function Updatesubcat(Request $request)
{
    
        $subcat_id=$request->id;
        $category_name=$request->category_name;
        $subcat_name=$request->subcat_name;
       
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
        
        $this->validate(
            $request,
                [
                    'category_name'=>'required',
                  
                ],
                [
        
                    'category_name.required'=>'Enter your name',
                    
                ]
        );


        $update = DB::table('subcat')
                 ->where('subcat_id', $subcat_id)
                 ->update(['category_id'=>$category_name,'subcat_name'=>$subcat_name,'updated_at'=>$updated_at]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
  public function deletesubcat(Request $request)
    {
        $subcat_id=$request->id;

        $getfile=DB::table('subcat')
                ->where('subcat_id',$subcat_id)
                ->first();

      

    	$delete=DB::table('subcat')->where('subcat_id',$request->id)->delete();
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
