<?php

namespace App\Http\Controllers\Support_team;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class supportController extends Controller
{
	public function startup_team(Request $request){
		
		$product=DB::table('startup_data')
		        ->where('status',NULL)
				->limit(50)
		        ->get();
		return view('support_team.startups',compact("product"));
	}
public function supportteamLogout(Request $request)
     {
          $request->session()->flush();
           return redirect()->route('supportteamlogin')->withErrors("Enter email and password");

     }
	 public function pending(Request $request){
		
		$product=DB::table('startup_data')
		       ->where('status','pending')
		        ->get();
		return view('support_team.pending',compact("product"));
	}
	public function interested(Request $request){
		
		$product=DB::table('startup_data')
		         ->where('status','interested')
		        ->get();
		return view('support_team.interested',compact("product"));
	}
	public function startup_add(Request $request){
		
		return view("support_team.addnew_startup");
	}
	public function startup_addnew(Request $request){
		
		$s_name=$request->startup_name;
		$f_name=$request->founder_name;
		$email=$request->email;
		$contact=$request->contact;
		$insert=DB::table('startup_data')
		      ->insert(['name'=>$s_name,'founder_name'=>$f_name,'email'=>$email,'Contact'=>$contact]);
	    if($insert){
			return redirect()->back()->withErrors('Successfully Added');
		}
		else{
			return redirect()->back()->withErrors('Successfully not added');
		}
	}
	public function update_status(Request $request)
    {
		$startup_name=Session::get('support_name');
		$email=Session::get('support_email');
		$remark=$request->remark;
    $product_id = $request->id;
	    
		
		switch ($request->accept) {
        case 'accept':
            $status = 'interested';
            break;

        case 'reject':
           $status='rejected';
            break;

        case 'pending':
           $status='pending'; 
            break;
    }
		
    $product= DB::table('startup_data')
            ->where('id', $product_id)
                 ->update(['status'=>$status,'remark'=>$remark]);
    if($product){
		return redirect()->back()->withErrors('Successfully denied');
	   }
    else{
	return redirect()->back()->withErrors('try again');
	  }
    }
	public function registered(Request $request){
		$product=DB::table('cityadmin')
		        ->join('form_data', 'cityadmin.cityadmin_email', '=', 'form_data.email')
            ->select('form_data.*', 'cityadmin.*')
            ->get();
		return view('support_team.registered',compact("product"));
	}
}