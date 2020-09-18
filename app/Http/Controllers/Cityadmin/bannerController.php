<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class bannerController extends Controller
{
    public function banner(Request $request)
    {
     if(Session::has('cityadmin'))
     {   
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $banner= DB::table('banner')
        ->leftJoin ('tbl_category' , 'banner.bannerloc_id', '=', 'tbl_category.category_id')
        ->where('banner.cityadmin_id',$cityadmin->cityadmin_id)
        ->get();
        return view('cityadmin.banner.banner',compact("cityadmin_email","banner","cityadmin"));
        
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }
    }
    
     public function Addbanner(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $category= DB::table('tbl_category')
                ->where('cityadmin_id',$cityadmin->cityadmin_id)
                ->get();
         return view('cityadmin.banner.addbanner',compact("cityadmin_email","category","cityadmin"));
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }
    }
    
    
        public function AddNewbanner(Request $request)
    {
      if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $cityadmin_id = $cityadmin->cityadmin_id ;
        $banner_id=$request->id;
        $category_name=$request->bannerloc_id;
        $banner_name=$request->banner_name;
        $keyword=$request->banner_keyword;
        $old_banner_image=$request->old_banner_image;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $banner_image = $request->banner_image;
        $fileName = date('dmyhisa').'-'.$banner_image->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $banner_image->move('banner/images/'.$date.'/', $fileName);
        $banner_image = 'banner/images/'.$date.'/'.$fileName;


        $insert = DB::table('banner')
                  ->insert(['cityadmin_id'=>$cityadmin_id,'keyword'=>$keyword,'bannerloc_id'=>$category_name,'banner_name'=>$banner_name,'banner_image'=>$banner_image,'created_at'=>$created_at]);
     
     return redirect()->back()->withErrors('successfully');
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }

    }
    
    public function Editbanner(Request $request)
    {
     if(Session::has('cityadmin'))
      {	
       $banner_id=$request->id;
    	 $cityadmin_email=Session::get('cityadmin');
    	 
         $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email',$cityadmin_email)
                ->first();       
    	 $banner= DB::table('banner')
    	 		  ->where('banner_id',$banner_id)
    	 		  ->first();
    	 $category=DB::table('tbl_category')
    	        ->where('cityadmin_id',$cityadmin->cityadmin_id)
                ->get();		  
    	 return view('cityadmin.banner.Editbanner',compact("cityadmin_email","cityadmin","category","banner_id","banner"));
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }


    }
    public function Updatebanner(Request $request)
    {
      if(Session::has('cityadmin'))
      {
        $banner_id=$request->id;
        $category_name=$request->bannerloc_id;
        $banner_name=$request->banner_name;
        $keyword=$request->banner_keyword;
        $old_banner_image=$request->old_banner_image;
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
    

        $getImage = DB::table('banner')
                     ->where('banner_id',$banner_id)
                    ->first();

        $image = $getImage->banner_image;  

        if($request->hasFile('banner_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $banner_image = $request->banner_image;
            $fileName = date('dmyhisa').'-'.$banner_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $banner_image->move('banner/images/'.$date.'/', $fileName);
            $banner_image = 'banner/images/'.$date.'/'.$fileName;
        }
        else{
            $banner_image = $old_banner_image;
        }

        $update = DB::table('banner')
                 ->where('banner_id', $banner_id)
                 ->update(['bannerloc_id'=>$category_name,'banner_name'=>$banner_name,'keyword'=>$keyword, 'banner_image'=>$banner_image,'updated_at'=>$updated_at]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }
    }
    
    
    
  public function deletebanner(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $banner_id=$request->id;

        $getfile=DB::table('banner')
                ->where('banner_id',$banner_id)
                ->first();

        $banner_image=$getfile->banner_image;

    	$delete=DB::table('banner')->where('banner_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($banner_image)){
                unlink($banner_image);
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
