<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class incentiveController extends Controller
{
    
    public function incentive(Request $request)
    {
     if(Session::has('cityadmin'))
     {
     $cityadmin_email=Session::get('cityadmin');
    	 // $admin=DB::table('admin')
    		// 	->where('admin_email',$admin_email)
    		// 	->first();
    	  $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();
    			
    	$cityadmin_id = $cityadmin->cityadmin_id;
    	
    	$incentive = DB::table('incentive')
    	           ->join('delivery_boy', 'incentive.delivery_boy_id','=','delivery_boy.delivery_boy_id')
    	           ->where('delivery_boy.cityadmin_id', $cityadmin_id)
    	           ->get();
    	           
    	return view('cityadmin.incentive', compact("cityadmin_email", "cityadmin_id","cityadmin","incentive"));		
     }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }			
    }
    
    
    public function pay(Request $request)
    {
      if(Session::has('cityadmin'))
      {
    	 $cityadmin_email=Session::get('cityadmin');
    	 // $admin=DB::table('admin')
    		// 	->where('admin_email',$admin_email)
    		// 	->first();
    	  $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();
    	$pay = $request->pay;		
    	$remaining_incentive = $request->remaining_incentive;
    	$remaining = $remaining_incentive-$pay;
    	$paid_incentive = $request->paid_incentive;
    	$paid = $paid_incentive+$pay;
    	$cityadmin_id = $cityadmin->cityadmin_id;
    	$delivery_boy_id = $request->delivery_boy_id;
    	
    	$update = DB::table('incentive')
    	->where('delivery_boy_id', $delivery_boy_id)
    	->update(['paid_incentive'=>$paid,
    	'remaining_incentive'=>$remaining]);
       
       	  if($update){
            return redirect()->back()->withErrors('Rs. ' .$pay.  '  marked paid');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
    
    
    
    
      public function edit_incentive_amount(Request $request)
    {
      if(Session::has('cityadmin'))
       {
    	 $cityadmin_email=Session::get('cityadmin');
    	 // $admin=DB::table('admin')
    		// 	->where('admin_email',$admin_email)
    		// 	->first();
    	  $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();
    	   
    	  $cityadmin_id =$cityadmin->cityadmin_id;			
    			
    	   $amount=  DB::table('incentive_amount')
                ->where('cityadmin_id', $cityadmin_id)
               // ->where(strtotime('tbl_subscription.delivery_date') ,$current)
                ->first(); 
                
                
        if($amount){
              $incentive = $amount->delivery_boy_incentive;
            	return view('cityadmin.edit_incentive_amount', compact("cityadmin_email", "cityadmin_id","cityadmin", "incentive"));
            	
            
        }        
                
         else{
             $insert=	DB::table('incentive_amount')
     		         ->insert(['cityadmin_id'=>$cityadmin_id]);
     		   $incentive = 0;      
     		  return view('cityadmin.edit_incentive_amount', compact("cityadmin_email", "cityadmin_id","cityadmin", "incentive"));       
         }                  
    			
    	
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
    
    
      
      public function update_incentive_amount(Request $request)
    {
      if(Session::has('cityadmin'))
     {
    	 $cityadmin_email=Session::get('cityadmin');
    	 // $admin=DB::table('admin')
    		// 	->where('admin_email',$admin_email)
    		// 	->first();
    	  $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();
    			
    	$cityadmin_id =$cityadmin->	cityadmin_id;	
    // 	$incentive_amount =	DB::table('tbl_subscription')
    // 		                  ->get();
    	$amount=  DB::table('incentive_amount')
                ->where('cityadmin_id', $cityadmin_id)
               // ->where(strtotime('tbl_subscription.delivery_date') ,$current)
                ->first(); 	
                

         $incentive_amount= $request->incentive_amount;       
             
             $update=	DB::table('incentive_amount')
    	             ->where('cityadmin_id', $cityadmin_id)
     		         ->update(['delivery_boy_incentive'=>$incentive_amount]);
     		         
     		$subs_id=  DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->select('tbl_subscription.subs_id','cityadmin.cityadmin_id')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                   // ->where(strtotime('tbl_subscription.delivery_date') ,$current)
    	                    ->get();         
     		         
     	  foreach($subs_id as $subs_id){
     	
    	  $update1=	DB::table('tbl_subscription')
    	            ->where('subs_id',$subs_id->subs_id)    
    	            ->where('sub_status','!=','completed')
     		         ->update(['delivery_boy_incentive'=>$incentive_amount]);
    	}	         
         
        
    	
    
    	
     if($update){
            return redirect()->back()->withErrors('incentive amount set to rs. '.$incentive_amount.'  per order');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
}