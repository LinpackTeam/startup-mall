<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class inventoryController extends Controller
{
    
    public function inventory(Request $request)
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
      $inventory = DB::table('completed_orders')
                 ->leftjoin('tbl_subscription','completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
                 ->leftJoin('order_complains','completed_orders.completed_id', '=', 'order_complains.completed_id')
                 ->leftJoin('complains','order_complains.complain_id', '=', 'complains.complain_id')
                 ->join('delivery_boy','completed_orders.delivery_boy_id', '=', 'delivery_boy.delivery_boy_id')
                 ->join('product', 'tbl_subscription.product_id', '=', 'product.product_id')
                 ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
                 ->select('completed_orders.completed_id','completed_orders.delivery_date', 'completed_orders.user_id','delivery_boy.delivery_boy_name', 'complains.complain_name', 'product.product_name','tbl_subscription.price','complains.complain_id','order_complains.order_complain_id', 'order_complains.settled_amt')
                 ->where('tbl_category.cityadmin_id', $cityadmin_id)
                 ->get();
                 
       return view('cityadmin.inventory_details', compact("cityadmin_email", "cityadmin", "inventory"));           
    }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }             
                 
    }
       public function paycustomer(Request $request)
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
    	$order_complain_id = $request->order_complain_id;		
    	$user_id = 	$request->user_id;	
    	$complain_id = $request->complain_id;		
    	$pay = $request->pay;		
    	$cityadmin_id = $cityadmin->cityadmin_id;
    	$user_id = $request->user_id;
    	$add = DB::table('tbl_user')
    	->select('wallet_credits')
    	->where('user_id', $user_id)
    	->first();
    	$add1 =$add->wallet_credits;
    	$added =$add1 + $pay;
    	$update = DB::table('tbl_user')
    	->where('user_id', $user_id)
    	->update(['wallet_credits'=>$added]);
    	
    	$up = DB::table('order_complains')
    	->where('order_complain_id', $order_complain_id)
    	->update(['settled_amt'=>$pay]);
       
       	  if($update){
            return redirect()->back()->withErrors('Rs. ' .$pay.  ' paid to user against complain id ('.$complain_id.')');
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