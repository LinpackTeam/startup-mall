<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class paymentviaController extends Controller
{
    public function paymentvia(Request $request)
    {
        $admin_email=Session::get('admin');
    	
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();	
        
        $adminpaymentvia = DB::table('paymentvia')
    			         ->get();
        return view('admin.paymentvia.show_paymentvia',compact("adminpaymentvia", "admin_email", "admin"));
    	
    }
    
     public function adminAddpaymentvia(Request $request)
    {
        //$title = "Add paymentvia";
        
        // $app = DB::table('tbl_app')
        //         ->get();
        $admin_email=Session::get('admin');
    	$adminpaymentvia = DB::table('paymentvia')
    			         ->get();
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        return view('admin.paymentvia.add_paymentvia',compact("adminpaymentvia", "admin_email", "admin"));
    }
    
     public function adminAddNewpaymentvia(Request $request)
    {
        //return redirect()->back();
        $payment_mode = $request->payment_mode;
        $status = $request->status;
        //$paymentvia_image = $request->paymentvia_image;
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        $date=date('d-m-Y');
         //return redirect()->back();
    	         
    			         
        if($status=="")
        {
            $status=0;
        }
        
        $this->validate(
            $request,
                [
                    'payment_mode' => 'required',
                ],
                [
                    'payment_mode.required' => 'Enter payment mode.',
                    
                ]
        );

        

        $insertpaymentvia = DB::table('paymentvia')
                            ->insert([
                                'payment_mode'=>$payment_mode,
                                'status'=>$status,
                                'created_at'=>$created_at,
                                'updated_at'=>$updated_at
                            ]);
        
        if($insertpaymentvia){
            return redirect()->back()->withErrors('paymentvia added successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    
}
    
    public function adminEditpaymentvia(Request $request)
    {
        //$title = "Edit paymentvia";
        
    	$paymentvia_id = $request->paymentvia_id;

    	$paymentvia = DB::table('paymentvia')
        	          ->where('paymentvia_id', $paymentvia_id)
        			  ->first();
        $admin_email=Session::get('admin');
        	
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        //$app = DB::table('tbl_app')
                //->get();

        return view('admin.paymentvia.update_paymentvia',compact("paymentvia","admin_email","admin"));
    }

    public function adminUpdatepaymentvia(Request $request)
    {
        //return redirect()->back();
        $paymentvia_id = $request->paymentvia_id;
        $payment_mode = $request->payment_mode;
        $status = $request->status;
        $api_key = $request->api_key;
        $updated_at = Carbon::now();
        $date = date('d-m-Y');
         if($status=="")
        {
            $status=0;
        }
    
    	

       
        $updatepaymentvia = DB::table('paymentvia')
                            ->where('paymentvia_id', $paymentvia_id)
                            ->update([
                                'payment_mode'=>$payment_mode,
                                'Papi_key'=> $api_key,
                                'status'=>$status,
                                'updated_at'=>$updated_at
                            ]);
        
        if($updatepaymentvia){
            return redirect()->back()->withErrors('paymentvia updated successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
    }
    
     public function adminDeletepaymentvia(Request $request)
    {
        $paymentvia_id=$request->paymentvia_id;


    	$delete=DB::table('paymentvia')->where('paymentvia_id',$request->paymentvia_id)->delete();
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