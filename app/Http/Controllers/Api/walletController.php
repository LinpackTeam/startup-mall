<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\carbon;

class walletController extends Controller
{
  
     public function showcredit(Request $request)
    { 
        $user_id = $request->user_id;
        $wallet_amt = DB::table('tbl_user')
                    ->select('wallet_credits')
                    ->where('user_id', $user_id)
                    ->get();
                   
                    
                    
       if($wallet_amt){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$wallet_amt);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }             
        
    }
  
  
  
  
  //billing history
   public function billing_history(Request $request)
    {
      $user_id= $request->user_id;
      $data=DB::table('completed_orders')
    	   ->join('tbl_subscription', 'completed_orders.subs_id', '=', 'tbl_subscription.subs_id')
    	   ->join('product' , 'tbl_subscription.product_id','=','product.product_id')
            ->select('completed_orders.delivery_date', 'product.product_name', 'tbl_subscription.order_qty','tbl_subscription.price','tbl_subscription.order_type','tbl_subscription.order_qty', 'product.product_image', 'product.qty', 'product.unit')
    	    ->where('completed_orders.user_id', $user_id)
             ->get();
                            
      if(count($data)>0){
        	$message = array('status'=>'1', 'message'=>'data found', 'data'=>$data);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
        	return $message;
        }                        
                            
    
    }
    
    
      public function credit_history(Request $request)
    { 
        $user_id = $request->user_id;
        $show =  DB::table('wallet_recharge_history')
              ->where('user_id',$user_id)
              ->where('recharge_status','success')
              ->orderBy('wallet_recharge_history_id', 'DESC' )
              ->get();
        
        if($show){
        	$message = array('status'=>'1', 'message'=>'data found','data'=>$show);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }               
    }
    
     public function add_credit(Request $request)
    { 
        $add_to_wallet = $request->amount;
        $user_id = $request->user_id;
        $wallet_amt = DB::table('tbl_user')
                    ->select('wallet_credits')
                    ->where('user_id', $user_id)
                    ->first();
        $city =  DB::table('user_address')
                    ->select('city_id','address_id')
                    ->where('user_id', $user_id)
                    ->first();
         $city_id = $city->city_id;        
        $date_of_recharge= carbon::now();            
        $amount = $wallet_amt->wallet_credits;
        $added = $add_to_wallet + $amount;
        $recharge_status = $request->recharge_status;
        $first_recharge = DB::table('first_wallet_recharge')
                    ->select('product_id', 'free_for', 'city_id')
                    ->where('min_wallet_recharge', '<=', $add_to_wallet)
                    ->where('city_id', $city_id)
                    ->first();  
       $plan = DB::table('subscription_plans')
                    ->where('skip_days', 1)
                    ->first(); 
        $ballowsubs = DB::table('tbl_subscription')
                    ->where('user_id', $user_id)
                    ->where('sub_status', 'balance_low')
                    ->get();
        $currentDate = date('d-m-Y'); 
        $day = 1;
        $newdate = date('d-m-Y', strtotime($currentDate.' + '.$day.' days'));
    			
        foreach($ballowsubs as $ballowsubss){
            if($added >= $ballowsubss->price){
                if($currentDate >=$ballowsubss->delivery_date){
                     DB::table('tbl_subscription')
                    ->where('subs_id', $ballowsubss->subs_id)
                    ->update(['sub_status'=>'ongoing',
                    'delivery_date'=> $newdate]);
                    }
                else{
                     DB::table('tbl_subscription')
                    ->where('subs_id', $ballowsubss->subs_id)
                    ->update(['sub_status'=>'ongoing']);
                }    
            }
        }   
        
                    
                    
                    
    //$min_wallet_recharge =  $first_recharge->min_wallet_recharge;       
       $checkfirstrechargestatus =  DB::table('tbl_user')
                    ->where('user_id', $user_id)
                    ->where('first_recharge_coupon', '0')
                    ->first(); 
                    
		
		$first_recharge1 = DB::table('first_wallet_recharge')
                    ->select('product_id', 'free_for', 'city_id')
                    ->where('min_wallet_recharge', '<=', $add_to_wallet)
                    ->where('city_id', $city_id)
                    ->get();  
                    
         $ph = DB::table('tbl_user')
                  ->select('user_phone', 'user_email')
                  ->where('user_id',$user_id)
                  ->first();
        $user_phone = $ph->user_phone;
        $user_email = $ph->user_email;
                     
    

if($first_recharge && $checkfirstrechargestatus){         
if($recharge_status == 'success'){
            
            
      $address_id = $city->address_id;             
      $plan_id = $plan->plan_id;            
      $product_id = $first_recharge->product_id;
      $p = DB::table('product')
                    ->where('product_id', $product_id)
                    ->first();
      $product_name = $p->product_name; 
      $order_qty = 1;
      $price = 0;
      $skip_days = 1; 
      $sub_status = 'free';
      $days =  $first_recharge->free_for; 
      $created_at = Carbon::now();
      $updated_at = Carbon::now();
      $current = Carbon::now();
      $current->toDateString();
      $start_date = date('d-m-Y', strtotime($current.' + '.$skip_days.' days'));
      $end_date = date('d-m-Y', strtotime($current.' + '.$days.' days'));    
      
       $insert = DB::table('tbl_subscription')
                   ->insert(['user_id'=>$user_id,
                        'address_id'=>$address_id,
                        'product_id'=> $product_id,
                        'start_date'=> $start_date,
                        'end_date'=> $end_date,
                        'delivery_date'=> $start_date,
                        'order_type'=>'Subscribe',
                        'plan_id'=>$plan_id,
                        'order_qty'=>$order_qty,
                        'price'=>$price,
                        'sub_status'=>$sub_status,
                        'created_at'=>$created_at,
                        'updated_at'=>$updated_at]);
                        
                        
           $update = DB::table('tbl_user')
                   ->where('user_id', $user_id)
                   ->update(['first_recharge_coupon'=>1]);
                   
                   
             $wallet_amt = DB::table('tbl_user')
                    ->where('user_id', $user_id)
                    ->update(['wallet_credits'=>$added]);
             
              $insert=  DB::table('wallet_recharge_history')
                    ->insert(['user_id'=>$user_id,
                    'amount'=>$add_to_wallet,
                    'date_of_recharge'=>$date_of_recharge,
                    'recharge_status'=> $recharge_status]);        
           
           
               

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
                $getInvitationMsg = "Hurray!your first wallet recharge of rs. ".$add_to_wallet. " is successful and You won a free Subscription of " .$product_name. " * " .$order_qty. "unit for free is Successful. Which is going to start from ".$start_date. "to".$end_date ; 

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
                 $Msg = "Hurray! your first wallet recharge of rs. ".$add_to_wallet. " is successful and You won a free Subscription of " .$product_name. " * " .$order_qty. "unit for free is Successful. Which is going to start from ".$start_date. "to".$end_date ; 
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
                    //constructing the message
                    $body = "Subject: successfull subscription\n\n $Msg ";
                     
                    // ...and away we go!
                    $retval = mail($to,'GoSubscribe Subscription',$body,$head);
               }
                 ////end send mail 
                  
                  
                    
                            
        	$message = array('status'=>'1', 'message'=>'data inserted successfully');
        	return $message;
        }
        }
        
        
        else{
             $insert=  DB::table('wallet_recharge_history')
                    ->insert(['user_id'=>$user_id,
                    'amount'=>$add_to_wallet,
                    'date_of_recharge'=>$date_of_recharge,
                    'recharge_status'=> $recharge_status]); 
        	$message = array('status'=>'0', 'message'=>'Failed! try again', 'data'=>[]);
        	return $message;
        }
}
    else{
            if($recharge_status == 'success'){
              $wallet_amt = DB::table('tbl_user')
                    ->where('user_id', $user_id)
                    ->update(['wallet_credits'=>$added]);
             
              $insert=  DB::table('wallet_recharge_history')
                    ->insert(['user_id'=>$user_id,
                    'amount'=>$add_to_wallet,
                    'date_of_recharge'=>$date_of_recharge,
                    'recharge_status'=> $recharge_status]); 
        	$message = array('status'=>'1', 'message'=>'wallet amount updated');
        	return $message;
        }
        else{
         $insert=  DB::table('wallet_recharge_history')
                    ->insert(['user_id'=>$user_id,
                    'amount'=>$add_to_wallet,
                    'date_of_recharge'=>$date_of_recharge,
                    'recharge_status'=> $recharge_status]); 
        	$message = array('status'=>'0', 'message'=>'Failed! try again', 'data'=>[]);
        	return $message;
        } 
    }
        
        
        
        
        }
 
     
    
    
    public function totalbill(Request $request)
    { 
        $user_id = $request->user_id;
        $wallet_amt = DB::table('tbl_user')
                    ->select('wallet_credits')
                    ->where('user_id', $user_id)
                    ->first(); 
    
       $current_amount = $wallet_amt->wallet_credits;
       $last = DB::table('wallet_recharge_history')
                    ->select('amount', 'date_of_recharge')
                    ->where('user_id', $user_id)
                    ->where('recharge_status', 'success')
                    ->orderBy('wallet_recharge_history_id', 'desc')
                    ->first();
        
    if($last){
        $lastrecharge = $last->amount;
        $date = $last->date_of_recharge;
         $lastrechargedate=date('d-m-Y', strtotime($date));
        $orders = DB::table('tbl_subscription')
                    ->where('user_id', $user_id)
                    ->where('start_date','>',$lastrechargedate)
                    ->SUM('price');
        
      $balanceafrecharge = $current_amount + $orders;
    	$message = array('status'=>'1', 'message'=>'data found','billafterrecharge'=>$orders, 'balanceafterrecharge'=>$balanceafrecharge,'lastrecharge'=>$lastrecharge, 'currentamount'=>$current_amount);
        	return $message;
    }
    else{
        $message = array('status'=>'0', 'message'=>'data found','billafterrecharge'=>0, 'balanceafterrecharge'=>0,'lastrecharge'=>0, 'currentamount'=>$current_amount);
        	return $message;
    }
    }
    
    
  
  
  
  
  
  
    //  public function add_credit(Request $request)
    // { 
    //     $add_to_wallet = $request->amount;
    //     $user_id = $request->user_id;
    //     $wallet_amt = DB::table('tbl_user')
    //                 ->select('wallet_credits')
    //                 ->where('user_id', $user_id)
    //                 ->first();
    //     $date_of_recharge= carbon::now();            
    //     $amount = $wallet_amt->wallet_credits;
    //     $added = $add_to_wallet + $amount;
    //     $recharge_status = $request->recharge_status;
                    
                    
                    
    //   if($recharge_status == 'success'){
    //           $wallet_amt = DB::table('tbl_user')
    //                 ->where('user_id', $user_id)
    //                 ->update(['wallet_credits'=>$added]);
             
    //           $insert=  DB::table('wallet_recharge_history')
    //                 ->insert(['user_id'=>$user_id,
    //                 'amount'=>$add_to_wallet,
    //                 'date_of_recharge'=>$date_of_recharge,
    //                 'recharge_status'=> $recharge_status]); 
    //     	$message = array('status'=>'1', 'message'=>'wallet amount updated');
    //     	return $message;
    //     }
    //     else{
    //      $insert=  DB::table('wallet_recharge_history')
    //                 ->insert(['user_id'=>$user_id,
    //                 'amount'=>$add_to_wallet,
    //                 'date_of_recharge'=>$date_of_recharge,
    //                 'recharge_status'=> $recharge_status]); 
    //     	$message = array('status'=>'0', 'message'=>'Failed! try again', 'data'=>[]);
    //     	return $message;
    //     }                         
        
    // }
    
    
    
      public function show_recharge_history(Request $request)
    { 
        $user_id = $request->user_id;
        $show =  DB::table('wallet_recharge_history')
              ->join('tbl_user', 'wallet_recharge_history.user_id','=','tbl_user.user_id')
              ->where('tbl_user.user_id',$user_id)
              ->orderBy('wallet_recharge_history.wallet_recharge_history_id', 'DESC' )
              ->get();
        
        if($show){
        	$message = array('status'=>'1', 'message'=>'data found','data'=>$show);
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'something went wrong', 'data'=>[]);
        	return $message;
        }               
    }
}