<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;

class dispatchController extends Controller
{
    
    public function dispatch_panel(Request $request)
    {
    $cityadmin_email=Session::get('cityadmin');
    	 
     $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();
    $cityadmin_id = $cityadmin->cityadmin_id;				
     $day = 1;
     $currentDate = date('d-m-Y');
     $end = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
	 	
	  $assignedtodayorder  =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->join('delivery_boy','tbl_subscription.delivery_boy_id', '=','delivery_boy.delivery_boy_id'  )
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits','delivery_boy.delivery_boy_name')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('tbl_subscription.delivery_boy_id','!=', 'N/A')
    	                    ->where('tbl_subscription.delivery_date', $currentDate)
    	                    ->orderBy('tbl_subscription.user_id')
    	                    ->get(); 
    	                    
      
       $unassignedtodayorder  =   DB::table('tbl_subscription')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('tbl_subscription.delivery_boy_id', 'N/A')
    	                   ->where('tbl_subscription.delivery_date', $currentDate)
    	                   ->orderBy('tbl_subscription.user_id')
    	                    ->get(); 
      
      
      
    	    $assignednextdayorder  =   DB::table('tbl_subscription')
    	                     ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('delivery_boy','tbl_subscription.delivery_boy_id', '=','delivery_boy.delivery_boy_id'  )
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits','delivery_boy.delivery_boy_name')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('tbl_subscription.delivery_boy_id','!=', 'N/A')
    	                    ->where('tbl_subscription.delivery_date', $end)
    	                    ->orderBy('tbl_subscription.user_id')
    	                    ->get();      
    	       
    	       
     $unassignednextdayorder  =   DB::table('tbl_subscription')
    	                     ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('user_address','tbl_subscription.address_id', '=', 'user_address.address_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->join('tbl_user', 'tbl_subscription.user_id', '=', 'tbl_user.user_id')
    	                    ->select('tbl_subscription.subs_id','tbl_subscription.user_id','tbl_subscription.delivery_boy_incentive','tbl_subscription.delivery_boy_id','tbl_subscription.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type', 'user_address.address_id', 'user_address.area_id', 'user_address.address','tbl_user.wallet_credits')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('tbl_subscription.delivery_boy_id', 'N/A')
    	                    ->where('tbl_subscription.delivery_date', $end)
    	                    ->orderBy('tbl_subscription.user_id')
    	                    ->get();         
    	       
    $cash_requestunassigned = DB::table('cash_recharge')
                            ->join('cityadmin', 'cash_recharge.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                            ->join('user_address','cash_recharge.user_id', '=', 'user_address.user_id')
                            ->where('cash_recharge.delivery_boy_id', 'n/a')
                           ->where('cash_recharge.date_of_collection', $currentDate)
                           ->where('cash_recharge.cityadmin_id', $cityadmin_id)
                           ->orderBy('cash_recharge.user_id')
                           ->get();
    	     
    $cash_requestassigned = DB::table('cash_recharge')
                           ->join('cityadmin', 'cash_recharge.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                            ->join('user_address','cash_recharge.user_id', '=', 'user_address.user_id')
                           ->join('delivery_boy','cash_recharge.delivery_boy_id', '=', 'delivery_boy.delivery_boy_id')
                           ->where('cash_recharge.delivery_boy_id','!=', 'n/a')
                           ->where('cash_recharge.cityadmin_id', $cityadmin_id)
                           ->where('cash_recharge.date_of_collection', $currentDate)
                           ->orderBy('cash_recharge.user_id')
                           ->get();	     
    	                    	                    
    	 	  $completed_orders = DB::table('completed_orders')
    	                    ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	                    ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
    	                    ->join('subcat','product.subcat_id','=','subcat.subcat_id')
    	                    ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
    	                    ->join('cityadmin', 'tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
    	                    ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
    	                    ->select('completed_orders.completed_id','completed_orders.delivery_date', 'cityadmin.cityadmin_name','city.city_name','product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type')
    	                    ->where('cityadmin.cityadmin_id', $cityadmin_id)
    	                    ->where('completed_orders.delivery_date', $currentDate)
                            ->get();
                                               
    	                    
    	              
    	 $delivery_boy =  DB::table('delivery_boy')
    	                   ->join('delivery_boy_area', 'delivery_boy.delivery_boy_id', '=', 'delivery_boy_area.delivery_boy_id')
    	                    ->select('delivery_boy.delivery_boy_id', 'delivery_boy.delivery_boy_phone', 'delivery_boy.lat', 'delivery_boy.lng' , 'delivery_boy.delivery_boy_name' , 'delivery_boy_area.area_id' )
    	                    ->where('delivery_boy.delivery_boy_status', 'online')
    	                    ->where('delivery_boy.cityadmin_id', $cityadmin_id)
    	                   // ->where('delivery_boy_area.area_id', $area_id)
    	                   // ->where('tbl_subscription.subs_id',$subs_id)
    	                    ->get();
    	                    
    	                    
    	$onlinedelivery_boy =  DB::table('delivery_boy')
    	                    ->where('delivery_boy_status', 'online')
    	                    ->where('cityadmin_id', $cityadmin_id)
    	                    ->get();                    
    	                    
    	 $offlinedelivery_boy =  DB::table('delivery_boy')
    	                    ->where('delivery_boy_status', 'offline')
    	                    ->where('cityadmin_id', $cityadmin_id)
    	                    ->get();
    	                    
    	  $totaldelivery_boy =  DB::table('delivery_boy')
    	                    ->where('cityadmin_id', $cityadmin_id)
    	                    ->get();                  
        
    	  foreach($delivery_boy as $delivery_boy2)
    	  {
    	      $boy_area_id=$delivery_boy2->area_id;
    	  }
    	  $boi_array=array();
    	  $latitude=0;
    	  $longitude=0;
    	  $i=0;
    	  foreach($delivery_boy as $boi)
    	  {
    	      $boi_array[]=array($boi->delivery_boy_name, $boi->delivery_boy_phone, $boi->lat, $boi->lng);
    	      $latitude=$latitude+$boi->lat;
    	      $longitude=$longitude+$boi->lng;
    	      $i++;
    	  }
    	  
    	  $map_list = json_encode($boi_array);
    	  
    	  $latitude=$latitude/$i;
    	  
    	  $longitude=$longitude/$i;
    	  
    	  
    // 	  return $map_list;
    
    	  
        //   var_dump($completed_orders);
            return view('cityadmin.dispatchpanel', compact("cityadmin_email", "cityadmin", "completed_orders","unassignedtodayorder","assignedtodayorder","unassignednextdayorder", "assignednextdayorder","delivery_boy","boy_area_id","onlinedelivery_boy", "offlinedelivery_boy", "totaldelivery_boy", "map_list","latitude","longitude",'cash_requestunassigned','cash_requestassigned'));
           
        //   echo $todayorder[0]->delivery_boy_id;
      }





    public function assigned(Request $request)
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
      
      


    public function assignedcashrequest(Request $request)
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
    	$request_id = $request->request_id;
    	 $update = DB::table('cash_recharge')
    	          ->where('request_id',$request_id)
    	          ->update(['delivery_boy_id'=>$delivery_boy
    	          ]);
    	          
               
    	          
    	  if($update){
            return redirect()->back()->withErrors('Delivery boy assigned successfully');
        }
        else{
            return redirect()->back()->withErrors("Something wents wrong");
        }		
    			
    }
      



  }