<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class OrderController extends Controller
{
    
    public function today_orders(Request $request)
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
    			
    	$currentDate = date('d-m-Y');
        $day = 1;
       $current2 = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
    			
    	 $cityadmin_id = $cityadmin->cityadmin_id;		
    	  $todayorder  =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->leftJoin('delivery_boy','tbl_subscription.delivery_boy_id', '=','delivery_boy.delivery_boy_id'  )
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits','delivery_boy.delivery_boy_name')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->orderBy('user_id')
    	                   //->where('tbl_subscription.delivery_date' ,$currentDate)
    	                    ->get(); 
    	   //$subs_id = $todayorder->subs_id;
    	              
    	 $delivery_boy =  DB::table('delivery_boy')
    	                   ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
    	                    ->select('delivery_boy.delivery_boy_id' , 'delivery_boy.delivery_boy_name' , 'delivery_boy_area.area_id' )
    	                    ->where('delivery_boy.delivery_boy_status', 'online')
    	                    ->where('delivery_boy.cityadmin_id', $cityadmin_id)
    	                   // ->where('delivery_boy_area.area_id', $area_id)
    	                   // ->where('tbl_subscription.subs_id',$subs_id)
    	                    ->get();
        
    	  foreach($delivery_boy as $delivery_boy2)
    	  {
    	      $boy_area_id=$delivery_boy2->area_id;
    	  }
    	  
    	  
    	  	
          //var_dump($todayorder);     
        return view('cityadmin.today_orders', compact("cityadmin_email", "cityadmin","todayorder","delivery_boy","boy_area_id"));
           //return view('admin.index',compact(""));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
      }




    public function next_day_orders(Request $request)
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
    			
    	 $currentDate = date('d-m-Y');
         $day = 1;
         $end = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
    			
    	 $cityadmin_id = $cityadmin->cityadmin_id;		
           
    	   
    	   
    	    $nextdayorder  =   DB::table('tbl_subscription')
    	                     ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->leftJoin('delivery_boy','tbl_subscription.delivery_boy_id', '=','delivery_boy.delivery_boy_id'  )
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits','delivery_boy.delivery_boy_name')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('tbl_subscription.delivery_date', $end)
    	                    ->orderBy('user_id')
    	                    ->get();      
    	                    
    	  $delivery_boy =  DB::table('delivery_boy')
    	                   ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
    	                    ->select('delivery_boy.delivery_boy_id' , 'delivery_boy.delivery_boy_name' , 'delivery_boy_area.area_id' )
    	                    ->where('delivery_boy.delivery_boy_status', 'online')
    	                    ->where('delivery_boy.cityadmin_id', $cityadmin_id)
    	                    ->get();
        
    	  foreach($delivery_boy as $delivery_boy2)
    	  {
    	      $boy_area_id=$delivery_boy2->area_id;
    	  }
    	  
    	  
    	  	                  
    	                    
    	                    
        return view('cityadmin.next_day_orders', compact("cityadmin_email", "cityadmin", "nextdayorder","delivery_boy","boy_area_id"));
           //return view('admin.index',compact(""));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
      }




    public function completed(Request $request)
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
    			
    	$current = Carbon::now();
        $current->toDateString();
        $day = 1;
       $current2 = date('d-m-Y', strtotime($current.' + '.$day.' days'));
    			
    	 $cityadmin_id = $cityadmin->cityadmin_id;		
    	 
    	                    
    	  $completed_orders = DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->select('completed_orders.user_id', 'completed_orders.delivery_boy_id', 'completed_orders.delivery_boy_incentive', 'completed_orders.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
                            ->get();
                            
        
    	  
    	  
    	  	
                   
        return view('cityadmin.completed', compact("cityadmin_email", "cityadmin", "completed_orders"));
           //return view('admin.index',compact(""));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
     }
      
      
      
      

    public function assigned(Request $request)
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
    	$delivery_boy_id = $request->delivery_boy_id;
    	$delivery_boy = $request->delivery_boy_name;
    	$incentive = $request->incentive;
    	$subs_id = $request->subs_id;
    	 $update = DB::table('tbl_subscription')
    	          ->where('subs_id',$subs_id)
    	          ->update(['delivery_boy_id'=>$delivery_boy
    	          ]);
    	          
               
    	          
    	  if($update){
            return redirect()->back()->withErrors('Delivery boy assigned successfully');
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