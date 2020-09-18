<?php

namespace App\Http\Controllers\cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class emailController extends Controller
{
    public function selectdate(Request $request)
    {
    	
                $city_id=$request->id;
			
				$dates=DB::table('start_up_screening')
				      ->where('startup_id',$city_id)
					  ->get();
               
				
			    
    	         return view('cityadmin.email.select',compact("dates","city_id"));
         


    }
    
    public function selecttwodates(Request $request)
    {
   
    
       
         $startup_id=$request->id;
		 
		 $date_s=$request->date_s;
		 $query=$request->query;
         $insert=DB::table('start_up_screening')
		          ->where('startup_id',$startup_id)
                  ->update(['selected_date'=>$date_s,'issue'=>$query]);
                  				  
    	if($insert){
			return redirect()->back()->withErrors('Date selected successfully');
		}
  

    }
    
	 

}