<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class subController extends Controller
{
  
     public function subscription(Request $request)
    {   
        $user_id= $request->user_id;
        $address_id = $request->address_id;
        $product_id= $request->product_id;
        $stock = DB::table('product')
            ->select('stock')
            ->where('product_id', $product_id)
            ->first();
         $cityad = DB::table('user_address')
                ->join('cityadmin', 'user_address.city_id', '=', 'cityadmin.city_id')
                ->select('cityadmin.cityadmin_id')
                ->where('user_address.user_id', $user_id)
                ->first();
        $cityadmin_id = $cityad->cityadmin_id;        
         $amount=  DB::table('incentive_amount')
    	   ->select('delivery_boy_incentive')
    	   ->where('cityadmin_id', $cityadmin_id)
    	    ->first();	
    	
    	$incentive = $amount->delivery_boy_incentive;
    	                      
            
        $start_date= $request->start_date;
        $order_type = 'Subscribe';
        $plan_id = $request->plan_id;
        $order_qty = $request->order_qty;
        $stock1 = $stock->stock;
        $stockqty = $stock1-$order_qty;
        $price = $request->subscription_price;
        $subscription_price=$order_qty*$price;
        $sub_status = 'ongoing';
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        $name= DB::table('product')
            ->select('product_name','unit')
            ->where('product_id', $product_id)
            ->first();
        $product_name =$name->product_name;
        $unit = $name->unit;
        $checksub = DB::table('tbl_subscription')
                  ->where('user_id',$user_id)
                  ->where('product_id',$product_id)
                  ->where('sub_status', '!=' , 'completed')
                  ->where('sub_status', '!=' , 'cancelled')
                  ->where('order_type' , 'Subscribe')
                  ->get();
                  
        $wallet_credits = DB::table('tbl_user')
                        ->select('wallet_credits')
                        ->where('user_id', $user_id)
                        ->first();
        $wallet_amt = $wallet_credits->wallet_credits;              
        $price2 =$wallet_amt-$subscription_price;       
                        
        
        if(count($checksub)>0){
            $message = array('status'=>'3', 'message'=>'already subscribed');
        	return $message;
        }
        
        else{
        if($stock1<$order_qty){
            $message = array('status'=>'4', 'message'=>'sorry! only '.$stock1.' left in the stock');
        	return $message;
        }    
            
       else {    
        if($wallet_amt>=$subscription_price){
         
         DB::table('tbl_user')
            ->where('user_id', $user_id)
            ->update(['wallet_credits'=>$price2]); 
          
            
         DB::table('product')
            ->where('product_id', $product_id)
            ->update(['stock'=>$stockqty]);   
            
         
         $ph = DB::table('tbl_user')
                  ->select('user_phone')
                  ->where('user_id',$user_id)
                  ->first();
        $user_phone = $ph->user_phone;
         
         
            
        $insert = DB::table('tbl_subscription')
                   ->insert(['user_id'=>$user_id,
                        'address_id'=>$address_id,
                        'product_id'=> $product_id,
                        'start_date'=> $start_date,
                        'delivery_boy_incentive'=>$incentive,
                        'delivery_date'=> $start_date,
                        'order_type'=>$order_type,
                        'plan_id'=>$plan_id,
                        'order_qty'=>$order_qty,
                        'price'=>$subscription_price,
                        'sub_status'=>$sub_status,
                        'created_at'=>$created_at,
                        'updated_at'=>$updated_at]);
               

        if($insert){
            // start sms
            $sms = DB::table('notificationby')
                   ->select('sms')
                   ->where('user_id',$user_id)
                   ->first();
            $sms_status = $sms->sms;  
            $sms_api_key=  DB::table('sms_api')
    	              ->select('sms_api_key', 'sender_id')
                      ->first();
            $api_key = $sms_api_key->sms_api_key;
            $sender_id = $sms_api_key->sender_id;
            if($sms_status == 1){
                $getAuthKey = $api_key;
                $getSenderId = $sender_id;
                $getInvitationMsg = "Hurray! Your Subscription of " .$product_name. " * " .$order_qty. $unit. " of price rs. ".$price. " is Successful. Which is going to start from ".$start_date. " please update your wallet amount always greater than equal to subscription price to continue your subscription"; 

                $authKey = $getAuthKey;
              // $mobileNumber1 = 8859593839;
                $senderId = $getSenderId;
                $message = $getInvitationMsg;
                $route = "4";
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $user_phone,
                    'message' => $message,
                    'sender' => $senderId,
                    'route' => $route
                );

                $url="https://control.msg91.com/api/sendhttp.php";

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));

                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                //get response
                $output = curl_exec($ch);

                curl_close($ch);
                
            }
                    // end sms
                  
                  
                 ///////start app notification
                 
                 
                //  $message=array('title' => 'GOSUBSCRIBE', 'body' => $message ,'sound'=>'Default','image'=>'Notification Image');



                //   $q = DB::table('tbl_user')
                //       ->select('device_id')
                //       ->where('user_id',$user_id)
                //       ->first();
                //     $device_id = $q->device_id;
                //   if($device_id!=""){
                //         $result = $gcm->send_notification($device_id, $message,"android");
                //          }
        
                 
                 
                 
                 ////////end app notification
                 
                 
                 
                 /////send mail
            $email = DB::table('notificationby')
                   ->select('email')
                   ->where('user_id',$user_id)
                   ->first();
            $email_status = $email->email;       
            if($email_status == 1){
                
                    $q = DB::table('tbl_user')
                              ->select('user_email')
                              ->where('user_id',$user_id)
                              ->first();
                            $user_email = $q->user_email;             
                         
                     $to = $user_email;
                    
                    $head = "MIME-Version: 1.0\r\n";
                    $head .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                    $head .= "X-Priority: 3\r\n";
                    $head .= "X-Mailer: PHP". phpversion() ."\r\n"; 
                 
                    
                    // Always set content-type when sending HTML email
                    
                    // More headers
                    
                      $head .= "From: GOSUBSCRIBE \r\n";
                       $message = "Hurray! Your Subscription of " .$product_name. " * " .$order_qty. $unit. " of price rs. ".$price. " is Successful. Which is going to start from ".$start_date. " please update your wallet amount always greater than equal to subscription price to continue your subscription";
                    //constructing the message
                    $body = "Subject: successfull subscription\n\n $message ";
                     
                    // ...and away we go!
                    $retval = mail($to,'GoSubscribe Subscription',$body,$head);
               }
                 ////end send mail 
                  
                  
                    
                            
        	$message = array('status'=>'1', 'message'=>'data inserted successfully');
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'insertion failed', 'data'=>[]);
        	return $message;
        }
    }
    else{
        	$message = array('status'=>'2', 'message'=>'your wallet balance is low please Recharge', 'data'=>[]);
        	return $message;
    }
  }
 }
}
  
  
  
   public function buyonce(Request $request)
    {   
        $data= $request->demo_array;
        $data_array = json_decode($data);
        $user_id= $request->user_id;
        $address_id = $request->address_id;
        $start_date= $request->start_date;
        $order_type = 'buyonce';
        $cart_id  = substr(md5(microtime()),rand(0,26),5);
        $plan_id = 'n/a';
        $cityad = DB::table('user_address')
                ->join('cityadmin', 'user_address.city_id', '=', 'cityadmin.city_id')
                ->select('cityadmin.cityadmin_id')
                ->where('user_address.user_id', $user_id)
                ->first();
        $cityadmin_id = $cityad->cityadmin_id;        
         $amount=  DB::table('incentive_amount')
    	   ->select('delivery_boy_incentive')
    	   ->where('cityadmin_id', $cityadmin_id)
    	    ->first(); 		
    	
    	$incentive = $amount->delivery_boy_incentive;
        $sub_status = 'buyonce';
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        $user_id= $request->user_id;
        $price2=0;
        $ph = DB::table('tbl_user')
                  ->select('user_phone')
                  ->where('user_id',$user_id)
                  ->first();
        $user_phone = $ph->user_phone;
    foreach ($data_array as $h){
        $price = $h->price;
        $product_id = $h->product_id;
        $order_qty = $h->order_qty;
        $price2+= $price*$order_qty;
        $name= DB::table('product')
            ->select('product_name','unit','qty')
            ->where('product_id', $product_id)
            ->first();
        $unit[] = $name->unit;
        $qty[]= $name->qty;
        $p_name[] = $name->product_name;
        $prod_name = implode(',',$p_name);
    }    
    
    foreach ($data_array as $h)
    { 
        $price = $h->price;
        $price1= $price*$order_qty;
        $order_qty = $h->order_qty;
        $product_id = $h->product_id;
         $stock = DB::table('product')
            ->select('stock', 'product_name')
            ->where('product_id', $product_id)
            ->first(); 
           
         $pro_name = $stock->product_name;
        $stock1 = $stock->stock;
        $stockqty = $stock1-$order_qty;    
      $wallet_credits = DB::table('tbl_user')
                        ->select('wallet_credits')
                        ->where('user_id', $user_id)
                        ->first();
      $wallet_amt = $wallet_credits->wallet_credits;              
      $price3 =$wallet_amt-$price2;  
     
        
        if($stock1<$order_qty){
        
            $message = array('status'=>'4', 'message'=>'sorry! the product('.$pro_name.') only '.$stock1.' left in the stock');
        	return $message;
        }    
            
       else {    
     if($wallet_amt>=$price2){
        $insert = DB::table('tbl_subscription')
                  ->insertGetId(['user_id'=>$user_id,
                        'address_id'=>$address_id,
                        'product_id'=>$product_id,
                        'delivery_boy_incentive'=>$incentive,
                        'start_date'=> $start_date,
                        'delivery_date'=> $start_date,
                        'order_type'=>$order_type,
                        'plan_id'=>$plan_id,
                        'order_qty'=>$order_qty,
                        'price'=>$price1,
                        'cart_id'=>$cart_id,
                        'sub_status'=>$sub_status,
                        'created_at'=>$created_at,
                        'updated_at'=>$updated_at]);
        }
        else{
        	$message = array('status'=>'2', 'message'=>'Your balance is low please recharge', 'data'=>[]);
        	return $message;
        }
        if($insert){
             DB::table('product')
            ->where('product_id', $product_id)
            ->update(['stock'=>$stockqty]); 
        }
  }
 }
  if($insert){
        
            
         DB::table('tbl_user')
            ->where('user_id', $user_id)
            ->update(['wallet_credits'=>$price3]); 
             // start sms
                 $sms = DB::table('notificationby')
                       ->select('sms')
                       ->where('user_id',$user_id)
                       ->first();
                $sms_status = $sms->sms;
                 $sms_api_key=  DB::table('sms_api')
    	              ->select('sms_api_key', 'sender_id')
                      ->first();
              $api_key = $sms_api_key->sms_api_key;
              $sender_id = $sms_api_key->sender_id;
                if($sms_status == 1){
                $getAuthKey = $api_key;
                $getSenderId = $sender_id;
                $getInvitationMsg = "Hurray! Your order id #".$cart_id." contains of " .$prod_name. " of price rs ".$price2. " is Successful.which is going to deliver on ".$start_date." please update your wallet amount greater than equal to you cart price to successfully place your order."; 

                $authKey = $getAuthKey;
              // $mobileNumber1 = 8859593839;
                $senderId = $getSenderId;
                $message1 = $getInvitationMsg;
                $route = "4";
                $postData = array(
                    'authkey' => $authKey,
                    'mobiles' => $user_phone,
                    'message' => $message1,
                    'sender' => $senderId,
                    'route' => $route
                );

                $url="https://control.msg91.com/api/sendhttp.php";

                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => $postData
                    //,CURLOPT_FOLLOWLOCATION => true
                ));

                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                //get response
                $output = curl_exec($ch);

                curl_close($ch);
                
                }
                    // end sms
                    
                    
                      /////send mail
            $email = DB::table('notificationby')
                   ->select('email')
                   ->where('user_id',$user_id)
                   ->first();
            $email_status = $email->email;       
            if($email_status == 1){
                 $Msg1 = "Hurray! Your order id #".$cart_id." contains of " .$prod_name. " of price rs ".$price2. " is Successful.which is going to deliver on ".$start_date." please update your wallet amount greater than equal to you cart price to successfully place your order."; 
                
                    $q = DB::table('tbl_user')
                              ->select('user_email')
                              ->where('user_id',$user_id)
                              ->first();
                            $user_email = $q->user_email;             
                         
                     $to = $user_email;
                    
                    $head = "MIME-Version: 1.0\r\n";
                    $head .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                    $head .= "X-Priority: 3\r\n";
                    $head .= "X-Mailer: PHP". phpversion() ."\r\n"; 
                 
                    
                    // Always set content-type when sending HTML email
                    
                    // More headers
                    
                      $head .= "From: $sender_id \r\n";
                    //constructing the message
                    $body = "Subject: successfull subscription\n\n $Msg1 ";
                     
                    // ...and away we go!
                    $retval = mail($to,'GoSubscribe Subscription',$body,$head);
               }
                 ////end send mail    
                    
           
        	$message = array('status'=>'1', 'message'=>'data inserted successfully', 'data'=>$insert );
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'insertion failed', 'data'=>[]);
        	return $message;
        }
 }
        
     
 
  public function showcart(Request $request){
      $user_id = $request->user_id;
      $order_type = 'buyonce';
      $order = DB::table('tbl_subscription')
                  ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
                  
                  ->select('product.product_name', 'product.product_image', 'tbl_subscription.subs_id','tbl_subscription.delivery_date','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.unit','product.qty', 'tbl_subscription.sub_status','tbl_subscription.cart_id')
                  ->where('tbl_subscription.user_id', $user_id)
                  ->where('tbl_subscription.order_type', $order_type)
                  ->where('tbl_subscription.sub_status', '!=', 'cancelled')
                  ->groupBy('tbl_subscription.cart_id','product.product_name', 'product.product_image', 'tbl_subscription.subs_id','tbl_subscription.delivery_date','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.unit','product.qty', 'tbl_subscription.sub_status')
                  ->orderBy('tbl_subscription.cart_id')
                  ->get();
                  
         if($order){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$order);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }          
                  
                  
  }     
  
  
    public function pause_order(Request $request){
      $subs_id = $request->subs_id;
      $pause_start_date = $request->pause_start;
      $pause_end_date = $request->pause_end;
      $sub_status = 'paused';
      $updated_at = Carbon::now();
      $delivery_date = $request->delivery_date;
      $day = 1;
      $end = date('d-m-Y', strtotime($pause_end_date.' + '.$day.' days'));
      if ($delivery_date == $pause_start_date){
      $pauseorder = DB::table('tbl_subscription')
                  ->where('subs_id', $subs_id)
                  ->update([
                      'delivery_date'=>$end,
                      'pause_start'=>$pause_start_date,
                      'pause_end'=>$pause_end_date,
                        'sub_status'=>$sub_status,
                        'updated_at'=>$updated_at]);
            }
            else{
                if($pause_end_date != 'n/a'){
                   $pauseorder = DB::table('tbl_subscription')
                  ->where('subs_id', $subs_id)
                  ->update([
                      'delivery_date'=>$end,
                      'pause_start'=>$pause_start_date,
                      'pause_end'=>$pause_end_date,
                        'sub_status'=>$sub_status,
                        'updated_at'=>$updated_at]);
                }
                else{
                   $pauseorder = DB::table('tbl_subscription')
                              ->where('subs_id', $subs_id)
                              ->update([
                                  'pause_start'=>$pause_start_date,
                                  'pause_end'=>$pause_end_date,
                                    'sub_status'=>$sub_status,
                                    'updated_at'=>$updated_at]);
            }
            }
       if($pauseorder){
        	$message = array('status'=>'1', 'message'=>'data updated', 'data'=>$pauseorder);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }
      
      
  } 
  
  
  
  
  public function resume_order(Request $request){
      $subs_id = $request->subs_id;
      $delivery = DB::table('completed_orders')
                  ->select('delivery_date')
                  ->where('subs_id', $subs_id)
                  ->orderBy('completed_id', 'desc')
                  ->first();
      $delivery1 = DB::table('completed_orders')
                  ->where('subs_id', $subs_id)
                  ->get();              
      $start_date =  $request->start_date;              
      $sub_status = 'ongoing';
      $updated_at = Carbon::now();
      $skip_days = $request->skip_days;
     
      
      if(count($delivery1)>0){
      $delivery_date = $delivery->delivery_date;
      $new_date = date('d-m-Y', strtotime($delivery_date.' + '.$skip_days.' days'));
      $pauseorder = DB::table('tbl_subscription')
                  ->where('subs_id', $subs_id)
                  ->update([
                      'delivery_date'=>$new_date,
                      'pause_start'=>'n/a',
                      'pause_end'=>'n/a',
                        'sub_status'=>$sub_status,
                        'updated_at'=>$updated_at]);
      }
      else{
          $pauseorder = DB::table('tbl_subscription')
                  ->where('subs_id', $subs_id)
                  ->update([
                      'delivery_date'=>$start_date,
                      'pause_start'=>'n/a',
                      'pause_end'=>'n/a',
                        'sub_status'=>$sub_status,
                        'updated_at'=>$updated_at]);
      }
       if($pauseorder){
        	$message = array('status'=>'1', 'message'=>'data updated', 'data'=>$pauseorder);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }
      
      
  }   
  
  
  public function reasonofcancellist(Request $request){ 
   $pauseorder = DB::table('cancel_reason')
                  ->get();
      
       if($pauseorder){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$pauseorder);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'no data available', 'data'=>[]);
        	return $message;
        }
  }
  
  
  public function delete_order(Request $request){
      $subs_id = $request->subs_id;
      $reason = $request->reason;
      $sub_status = 'cancelled';
      $updated_at = Carbon::now();
      $pauseorder = DB::table('tbl_subscription')
                  ->where('subs_id', $subs_id)
                  ->update([
                      'cancel_reason'=>$reason,
                        'sub_status'=>$sub_status,
                        'updated_at'=>$updated_at]);
      
       if($pauseorder){
        	$message = array('status'=>'1', 'message'=>'data delete', 'data'=>$pauseorder);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }
      
      
  }   
  
   
    
  public function showsubscription(Request $request){
      $user_id = $request->user_id;
      $order_type = 'Subscribe';
      $order = DB::table('tbl_subscription')
                  ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
                  ->join ('subscription_plans', 'tbl_subscription.plan_id', '=', 'subscription_plans.plan_id')
                  ->select('product.product_name', 'product.product_image', 'tbl_subscription.subs_id','tbl_subscription.delivery_date','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.product_id','product.subscription_price','product.unit','product.qty', 'tbl_subscription.sub_status','subscription_plans.skip_days','subscription_plans.plans')
                  ->where('tbl_subscription.user_id', $user_id)
                  ->where('tbl_subscription.order_type', $order_type)
                  ->where('tbl_subscription.sub_status', '!=', 'cancelled')
                  ->get();
                  
         if($order){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$order);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }          
                  
                  
  }

  public function scheduled(Request $request)
  {
    $user_id = $request->user_id;
    $selecteddate = $request->selecteddate;

    $currentDate = date('d-m-Y');

    $order = DB::table('tbl_subscription')
                  ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
                  // ->leftJoin('completed_orders','tbl_subscription.subs_id', '=', 'completed_orders.subs_id' )
                  ->leftJoin ('subscription_plans', 'tbl_subscription.plan_id', '=', 'subscription_plans.plan_id')
                  ->select('product.product_name', 'product.product_image', 'tbl_subscription.subs_id','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.unit','product.qty', 'tbl_subscription.sub_status','tbl_subscription.order_type','subscription_plans.skip_days','subscription_plans.plans')
                  ->where('tbl_subscription.user_id', $user_id)
                  ->orderBy('tbl_subscription.subs_id', 'DESC')
                  // ->where('tbl_subscription.order_type', 'Subscribe')
                  // ->where('tbl_subscription.plan_id', '!=', 'n/a')
                  // ->limit(8)
                  ->get();
              
    // for subscribed product
    $result = array();
    $i = 0;

    foreach ($order as $orders) {
      if($orders->order_type == "Subscribe" && $orders->skip_days != NULL && $orders->start_date != NULL){

        $startdate = strtotime($orders->start_date);
        $requestdate = strtotime($selecteddate);

        $newDate = 86400 * $orders->skip_days;

        if($startdate == $requestdate){
          array_push($result, $orders);
        }
        else{
          $i = 0;
          while($startdate <= $requestdate){
            if($startdate == $requestdate){
              array_push($result, $orders);
              break;
            }
            elseif ($startdate > $requestdate) {
              array_push($result, $orders->subs_id);
              break;
            }
            // echo $i;
            // $i++;
            $startdate += $newDate;
            // $data[] = $startdate;
            
          }
          // return $startdate."=".$requestdate;
        }
        
      }
      else{
        if(strtotime($selecteddate) == strtotime($orders->start_date)){
          array_push($result, $orders);
        }        
      }
    } 

    return $result;
  }
  
    
//     public function scheduled(Request $request){
//       $user_id = $request->user_id;
//       $selecteddate = $request->selecteddate;

//       $currentDate = date('d-m-Y');

//       $order = DB::table('tbl_subscription')
//                   ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
//                   ->leftJoin('completed_orders','tbl_subscription.subs_id', '=', 'completed_orders.subs_id' )
//                   ->leftJoin ('subscription_plans', 'tbl_subscription.plan_id', '=', 'subscription_plans.plan_id')
//                   ->select('product.product_name', 'product.product_image', 'tbl_subscription.subs_id','completed_orders.delivery_date','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.unit','product.qty', 'tbl_subscription.sub_status','tbl_subscription.order_type','subscription_plans.skip_days','subscription_plans.plans')
//                   ->where('tbl_subscription.user_id', $user_id)
//                 //   ->where('tbl_subscription.sub_status', '!=', 'cancelled')
//                   //>where('tbl_subscription.plan_id','!=', 'n/a')
//                   ->get();
              
//     $stocks['schedule']=array();

//     foreach($order as $orders){
//         if(strtotime($selecteddate) > strtotime($currentDate)){
//             $order_status = 'To Be Delivered';
//         }
//         elseif(strtotime($orders->delivery_date) == strtotime($selecteddate)){
//             $order_status = 'Delivered';
//         }
//         elseif(strtotime($selecteddate) < strtotime($currentDate)){
//             $order_status = 'Delivered';
//         }
//         else{
//             $order_status = 'To Be Delivered';
//         }

//         $orders2 = DB::table('tbl_subscription')
//                 ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
//                 ->leftJoin ('subscription_plans', 'tbl_subscription.plan_id', '=', 'subscription_plans.plan_id')
//                 ->select('product.product_name', 'product.product_image', 'tbl_subscription.subs_id','tbl_subscription.delivery_date','tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.start_date','product.description','product.unit','product.qty', 'tbl_subscription.sub_status','subscription_plans.skip_days','subscription_plans.plans','tbl_subscription.order_type')
//                 ->where('tbl_subscription.user_id', $user_id)
//                 // ->where('tbl_subscription.sub_status', '!=', 'cancelled')
//                 ->where('tbl_subscription.subs_id', $orders->subs_id)
//                 //->where('subscription_plans.skip_days', $orders->skip_days)
//                 ->first();
//         if(strtotime($selecteddate)<=strtotime($currentDate))
//         {
//             if($orders2->order_type == 'Subscribe'){

//             // for($i = strtotime($orders2->start_date); $i <= strtotime($selecteddate); $i++){

//                 // if($i == strtotime($selecteddate)){
//                 if(strtotime($selecteddate)==strtotime($orders2->delivery_date)){
//                 	$message = array('status'=>'1', 'message'=>'data found', 'subs_id'=>$orders2->subs_id, 'order_status'=>$order_status,'i'=>1, 'com'=>date('Y-m-d', strtotime($selecteddate)), 'data'=>$orders2);
//             	    $stocks['schedule'][]= $message;
//                  }
//            //   else{
//            //  	$message = array('status'=>'0', 'message'=>'data not found');
//            //  	//$stocks['schedule'][]= $message;    
//            //      }   
//            // }

//             }
//             else{
//                 if(date('Y-m-d', strtotime($orders->start_date)) == date('Y-m-d', strtotime($selecteddate))){
//                 	$message = array('status'=>'1', 'message'=>'data found', 'subs_id'=>$orders2->subs_id, 'order_status'=>$order_status, 'com'=>date('Y-m-d', strtotime($selecteddate)), 'data'=>$orders2);
//             	    $stocks['schedule'][]= $message;
//                 }
//                 //  else{
//                 // 	$message = array('status'=>'0', 'message'=>'data not found');
//                 // 	//$stocks['schedule'][]= $message;    
//                 //     }   
//                }
//         }
//         else{
            
//             if($orders->order_type == 'Subscribe'){
            
//                 for($i = strtotime(date('Y-m-d', strtotime($orders2->delivery_date))); $i <= strtotime(date('Y-m-d', strtotime($selecteddate))); $i+=strtotime('+1 days') ){
            
            
//                 echo date('Y-m-d', strtotime($i))."(".$i.")[==]".strtotime(date('Y-m-d', strtotime($selecteddate)))."<br>";
//                 if($i == strtotime(date('Y-m-d', strtotime($selecteddate)))){
//                 	$message = array('status'=>'1', 'message'=>'data found', 'subs_id'=>$orders2->subs_id, 'order_status'=>$order_status,'i'=>1, 'com'=>date('Y-m-d', strtotime($selecteddate)), 'data'=>$orders2);
//             	    $stocks['schedule'][]= $message;
            	    
//                 }
//               //   else{
//               //  	$message = array('status'=>'0', 'message'=>'data not found');
//               //  	//$stocks['schedule'][]= $message;    
//               //      }   
//                }
    
//             }
//             // else{
//             //     if(date('Y-m-d', strtotime($orders->start_date)) == date('Y-m-d', strtotime($selecteddate))){
//             //     	$message = array('status'=>'1', 'message'=>'data found', 'subs_id'=>$orders2->subs_id, 'order_status'=>$order_status, 'com'=>date('Y-m-d', strtotime($selecteddate)), 'data'=>$orders2);
//             // 	    $stocks['schedule'][]= $message;
//             //     }
//             //      else{
//             //     	$message = array('status'=>'0', 'message'=>'data not found');
//             //     	//$stocks['schedule'][]= $message;    
//             //         }   
//             // }
//         }
            
        
           
//     }
        
//     	//$message = array('status'=>'0', 'message'=>'something went wrong');
//     	return $stocks;
        
                  
// }   
  
  
   public function subscriptionoftheday(Request $request){
      $cityadmin_id = $request->cityadmin_id;
      $order_type = 'Subscribe';
      $currentDate = date('d-m-Y');
      $order = DB::table('tbl_subscription')
                  ->join ('product', 'tbl_subscription.product_id', '=', 'product.product_id')
                  ->join ('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
                  ->join ('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
                  ->select('product.product_id','product.product_name', 'product.product_image', 'product.description', 'product.subscription_price', 'product.price', 'product.mrp','product.unit','product.qty', DB::raw('count(tbl_subscription.product_id) as count'))
                  ->where('tbl_category.cityadmin_id', $cityadmin_id)
                  ->where('tbl_subscription.order_type', $order_type)
                  ->where('product.subscription_price','!=', 'NULL')
                  /*->where('tbl_subscription.delivery_date', $currentDate) */
                  ->groupBy('product.product_id','product.product_name', 'product.product_image', 'product.description', 'product.subscription_price', 'product.price', 'product.mrp','product.unit','product.qty')
                  ->orderBy('count','desc')
                  ->limit(6)
                  ->get();
                  
         if($order){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$order);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }          
                  
                  
  }                  
  
  
  
   public function modifysubs(Request $request)
   {
       $plan_id = $request->plan_id;
       $start_date = $request->new_start_date;
       $subs_id = $request->subs_id;
       $order_qty = $request->order_qty;
       $updated_at = carbon::now();
       $update = DB::table('tbl_subscription')
              ->where('subs_id',$subs_id)
              ->update(['plan_id'=>$plan_id,
              'start_date'=>$start_date,
              'order_qty'=>$order_qty,
              'delivery_date'=>$start_date,
              'updated_at'=>$updated_at]);
              
         if($update){
        	$message = array('status'=>'1', 'message'=>'your previous subscription plan changed');
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }                
       
   }
  
}