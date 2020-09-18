<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class supportController extends Controller
{
	public function startup_team(Request $request){
		
		$product=DB::table('startup_data')
		        ->get();
		return view('support_team.startups',compact("product"));
	}
	public function accept_team(Request $request)
    {
		$startup_name=Session::get('startup_data');
		$email=Session::get('startup_email');
    $product_id = $request->id;
       $product= DB::table('form_data')
            ->where('startup_id', $product_id)
                 ->update(['status'=>'Verification Success']);
       if($product){
		   return redirect()->back()->withErrors('Accepted Successfully');
	   }
else{
	return redirect()->back()->withErrors('try again');
	  }
    }
}