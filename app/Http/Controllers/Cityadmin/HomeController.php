<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    
    public function cityadminIndex(Request $request)
    {
     if(Session::has('cityadmin'))
     {
    	 $cityadmin_email=Session::get('cityadmin');
    	
    	  $cityadmin= DB::table('cityadmin')
    	                   ->where('cityadmin_email',$cityadmin_email)
    	                   ->first();    			
    	$current = Carbon::now();
        $current->toDateString();
        $day = 1;
        $current2 = date('d-m-Y', strtotime($current.' + '.$day.' days'));
    			
    	 $cityadmin_id = $cityadmin->city_id;		
    	  $todayorder  =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->select('tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                   // ->where(strtotime('tbl_subscription.delivery_date') ,$current)
    	                    ->get(); 
    	   
    	    $nextdayorder  =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->select('tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type')
    	                   // ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                   // ->where('delivery_date', $current2)
    	                    ->get();                   
    	                    
    	  $completed_orders = DB::table('completed_orders')
		                    ->join('user_data','completed_orders.user_id','=','user_data.id')
    	                    ->join('order_history', 'user_data.id', '=', 'order_history.user_id')
    	                    ->join('product' , 'order_history.product_id','=','product.product_id')
    	                    ->join('cityadmin', 'product.startup_id', '=', 'cityadmin.cityadmin_id')
    	                    ->select('completed_orders.user_id',  'user_data.user_name','order_history.billing_address','product.product_name','product.product_id','product.mrp','order_history.quantity')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
                            ->get();
                            
		 
         $total_earnings = DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->sum('tbl_subscription.price');
    	                    
    	 $total_users = DB::table('tbl_user')
    	                    ->count();     
    	  $ongoing =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('sub_status', 'ongoing')
    	                    ->count(); 
    	                    
    	                    
    	   $complete =   DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->count();   
    	  
    	  
    	  
    	  	
                   
        return view('cityadmin.index', compact("cityadmin_email", "cityadmin", "completed_orders","total_earnings", "total_users","ongoing","complete","todayorder", "nextdayorder"));
           //return view('admin.index',compact(""));
           
     }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
      }
    public function changestatus(Request $request){
		
	if(Session::has('cityadmin'))
     {
		 $cityadmin_email=Session::get('cityadmin');
    	  $cityadmin= DB::table('cityadmin')
    	                   ->where('cityadmin_email',$cityadmin_email)
						   ->get();
    	 $cityadmin_id = $cityadmin->city_id;
		$product_id=$request->id;
		$status = DB::table('completed_orders')
		        ->join('user_data','completed_orders.user_id','=','user_data.id')
				->where('startup_id', $cityadmin_id)
				->get();
	}
	
  }
}