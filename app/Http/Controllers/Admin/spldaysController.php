<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class spldaysController extends Controller
{
    public function spldays(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminspldays = DB::table('spldays')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();	
        return view('admin.spldays.show_spldays',compact("adminspldays", "admin_email", "admin"));
    	
    }
    
     public function adminAddspldays(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminspldays = DB::table('spldays')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        return view('admin.spldays.add_spldays',compact("adminspldays", "admin_email", "admin"));
    }
    
     public function adminAddNewspldays(Request $request)
    {
        $spldays = $request->spldays;
		$wishmsg = $request->wishmsg;
        
        $this->validate(
            $request,
                [
                    'spldays' => 'required',
					'wishmsg' => 'required',
                    
                ],
                [
                    'spldays.required' => 'Enter spldays name.',
                    'wishmsg.required' => 'enter wish msg.',
                ]
        );

        

        $insertspldays = DB::table('spldays')
                            ->insert([
                                'spldays'=>$spldays,
                                'wishmsg'=>$wishmsg
                            ]);
        
        if($insertspldays){
            return redirect()->back()->withErrors('special day added successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }
    
    public function adminEditspldays(Request $request)
    {
        //$title = "Edit spldays";
        
    	$spldays_id = $request->spldays_id;

    	$spldays = DB::table('spldays')
        	          ->where('spldays_id', $spldays_id)
        			  ->first();
        $admin_email=Session::get('admin');
        
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('admin.spldays.update_spldays',compact("spldays","admin_email","admin"));
    }

    public function adminUpdatespldays(Request $request)
    {
        //return redirect()->back();
        
        $spldays_id = $request->spldays_id;
        $spldays = $request->spldays;
		$wishmsg = $request->wishmsg;
        $getspldays = DB::table('spldays')
                    ->where('spldays_id',$spldays_id)
                    ->first();

        $updatespldays = DB::table('spldays')
                            ->where('spldays_id', $spldays_id)
                            ->update([
                              'spldays'=>$spldays,
                              'wishmsg'=>$wishmsg
                            ]);
        
        if($updatespldays){
            return redirect()->back()->withErrors('special day updated successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }
    
     public function adminDeletespldays(Request $request)
    {
        $spldays_id=$request->spldays_id;

        $getfile=DB::table('spldays')
                ->where('spldays_id',$spldays_id)
                ->first();

    	$delete=DB::table('spldays')->where('spldays_id',$request->spldays_id)->delete();
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