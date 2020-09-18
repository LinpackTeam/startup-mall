<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class delivery_timingController extends Controller
{
    public function delivery_timing(Request $request)
    {
    	

                 $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $delivery_timing= DB::table('delivery_timing')
    	 		          ->get();
    	         return view('admin.delivery_timing.delivery_timing',compact("admin_email","delivery_timing","admin"));



    }
  
    public function Editdelivery_timing(Request $request)
{
	 $admin_email=Session::get('admin');
	 $delivery_timing_id=$request->id;
	 $delivery_timing= DB::table('delivery_timing')
	            ->where('delivery_timing_id',$delivery_timing_id)
                ->first();
     $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
	 return view('admin.delivery_timing.Editdelivery_timing',compact("admin_email","delivery_timing","delivery_timing_id","admin"));
}
public function Updatedelivery_timing(Request $request)
{
    
        
        $delivery_timing_id = $request->id;
        $delivery_timing_text = $request->delivery_timing_text;
        $delivery_time_slot = $request->delivery_time_slot;

        $update = DB::table('delivery_timing')
                                ->where('delivery_timing_id', $delivery_timing_id)
                                ->update(['delivery_timing_text'=>$delivery_timing_text, 'delivery_time_slot'=>$delivery_time_slot]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
  
	

}

