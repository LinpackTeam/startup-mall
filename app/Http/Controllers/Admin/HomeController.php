<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomeController extends Controller
{
    
    public function adminIndex(Request $request)
    {
    	 $admin_email=Session::get('admin');
    	 // $admin=DB::table('admin')
    		// 	->where('admin_email',$admin_email)
    		// 	->first();
    	  $admin=DB::table('admin')
    			->where('admin_email',$admin_email)
    			->first();	
    	  $completed_orders = DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->select('completed_orders.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type')
                            ->get();
                            
         $total_earnings = DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->sum('price');
    	                    
    	 $total_users = DB::table('tbl_user')
    	                    ->count();     
    	  $ongoing =   DB::table('tbl_subscription')
    	                    ->where('sub_status', 'ongoing')
    	                    ->count();      
    	   $complete =   DB::table('completed_orders')
    	                    ->count();                     
    	                    
        return view('admin.index', compact("admin_email", "admin", "completed_orders", "total_earnings", "total_users", "ongoing","complete"));
           //return view('admin.index',compact(""));
      }


  }