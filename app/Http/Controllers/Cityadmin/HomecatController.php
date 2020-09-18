<?php

namespace App\Http\Controllers\cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomecatController extends Controller
{
    public function area(Request $request)
    {
    	if(Session::has('cityadmin'))
          {

                 $cityadmin_email=Session::get('cityadmin');
        
                    $cityadmin=DB::table('cityadmin')
                    ->where('cityadmin_email',$cityadmin_email)
                    ->first();
    	         $area= DB::table('area')
    	 		          ->get();
    	         return view('cityadmin.area.area',compact("cityadmin_email","area","cityadmin"));
          }
        else
             {
                return redirect()->route('cityadminlogin')->withErrors('please login first');
             }


    }
    
    public function Addarea(Request $request)
    {
    if(Session::has('cityadmin'))
     {
         $cityadmin_email=Session::get('cityadmin');
         $cityadmin=DB::table('cityadmin')
                    ->where('cityadmin_email',$cityadmin_email)
                    ->first();
         $city= DB::table('city')
                ->join ('cityadmin', 'city.city_id', '=', 'cityadmin.city_id')
                ->where('cityadmin_id',$cityadmin->cityadmin_id)
                ->get();            
    	return view('cityadmin.area.Addarea',compact("cityadmin_email","cityadmin","city"));
         }
    else
         {
            return redirect()->route('cityadminlogin')->withErrors('please login first');
         }

    }
    
    public function AddInsertarea(Request $request)
    {
    if(Session::has('cityadmin'))
     {	
    	$area_name=$request->area_name;
    	$city_id=$request->city_id;
        $created_at=date('d-m-Y h:i a');
       

      $insert = DB::table('area')
    				->insert(['area_name'=>$area_name, 'city_id'=>$city_id, 'created_at'=>$created_at]);
     return redirect()->back()->withErrors('successfully');
      }
     else
      {
        return redirect()->route('cityadminlogin')->withErrors('please login first');
      }
}
    
    public function Editarea(Request $request)
    {
    if(Session::has('cityadmin'))
     {
	 $cityadmin_email=Session::get('cityadmin');
	 $area_id=$request->id;
	 $area= DB::table('area')
	            ->where('area_id',$area_id)
                ->first();
     $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email',$cityadmin_email)
                ->first();
      $city= DB::table('city')
                ->join ('cityadmin', 'city.city_id', '=', 'cityadmin.city_id')
                ->where('cityadmin_id',$cityadmin->cityadmin_id)
                ->get();                    
	 return view('cityadmin.area.Editarea',compact("cityadmin_email","area","area_id","cityadmin","city"));
      }
    else
      {
        return redirect()->route('cityadminlogin')->withErrors('please login first');
      }
}

    public function Updatearea(Request $request)
    {
    if(Session::has('cityadmin'))
     {
        $area_id = $request->id;
        $area_name=$request->area_name;
    	$city_id=$request->city_id;
        $updated_at = date("d-m-y h:i a");
       
        $update = DB::table('area')
                                ->where('area_id', $area_id)
                                ->update(['area_name'=>$area_name,'city_id'=>$city_id, 'updated_at'=>$updated_at]);

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
    
    public function Deletearea(Request $request)
    {
     if(Session::has('cityadmin'))
     {    
        $area_id=$request->id;

        $getfile=DB::table('area')
                ->where('area_id',$area_id)
                ->first();

        $area_image=$getfile->area_image;

    	$delete=DB::table('area')->where('area_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($area_image)){
                unlink($area_image);
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