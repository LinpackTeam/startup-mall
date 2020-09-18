<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class faqController extends Controller
{
    public function faq(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminfaq = DB::table('faq')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();	
        return view('admin.faq.show_faq',compact("adminfaq", "admin_email", "admin"));
    	
    }
    
     public function adminAddfaq(Request $request)
    {
        $admin_email=Session::get('admin');
    	$adminfaq = DB::table('faq')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        return view('admin.faq.add_faq',compact("adminfaq", "admin_email", "admin"));
    }
    
     public function adminAddNewfaq(Request $request)
    {
        $question = $request->question;
		$answer = $request->answer;
		
        
        $this->validate(
            $request,
                [
                    'question' => 'required',
                    'answer' => 'required',
                ],
                [
                    'question.required' => 'Enter faq name.',
					'answer.required' => 'enter answer of your faq.',
                ]
        );

        

        $insertfaq = DB::table('faq')
                            ->insert([
                                'question'=>$question,
                                'answer'=>$answer,
                            ]);
        
        if($insertfaq){
            return redirect()->back()->withErrors('faq added successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }
    
    public function adminEditfaq(Request $request)
    {
        //$title = "Edit faq";
        
    	$faq_id = $request->faq_id;

    	$faq = DB::table('faq')
        	          ->where('faq_id', $faq_id)
        			  ->first();
        $admin_email=Session::get('admin');
        
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('admin.faq.update_faq',compact("faq","admin_email","admin"));
    }

    public function adminUpdatefaq(Request $request)
    {
        //return redirect()->back();
        
        $faq_id = $request->faq_id;
        $question = $request->question;
		$answer = $request->answer;
        $getfaq = DB::table('faq')
                    ->where('faq_id',$faq_id)
                    ->first();

        $updatefaq = DB::table('faq')
                            ->where('faq_id', $faq_id)
                            ->update([
                                'question'=>$question,
                                'answer'=>$answer,
                            ]);
        
        if($updatefaq){
            return redirect()->back()->withErrors('faq updated successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }
    
     public function adminDeletefaq(Request $request)
    {
        $faq_id=$request->faq_id;

        $getfile=DB::table('faq')
                ->where('faq_id',$faq_id)
                ->first();

    	$delete=DB::table('faq')->where('faq_id',$request->faq_id)->delete();
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