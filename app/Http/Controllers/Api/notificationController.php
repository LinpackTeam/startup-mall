<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class notificationController extends Controller
{
  
     public function spldaynotification(Request $request)
    {   
        $user_id= $request->user_id;
        $spldays_id= $request->spldays_id;
        $celeb_date=$request->celeb_date;
        $insert = DB::table('spldaynotification')
                   ->insert(['user_id'=>$user_id,
                        'spldays_id'=> $spldays_id,
                        'celeb_date'=> $celeb_date]);

        if($insert){
        	$message = array('status'=>'1', 'message'=>'data inserted successfully');
        	return $message;
        }
        else{
        	$message = array('status'=>'0', 'message'=>'insertion failed', 'data'=>[]);
        	return $message;
        }
    }
    
    
   
 
      public function notification2(Request $request) {
    $message= $request->message;    
    $delivery_boy_id = $request->delivery_boy_id;    
       $message=array('title' => 'BOSS', 'body' => $message ,'sound'=>'Default','image'=>'Notification Image');
        $registers = DB::table('tbl_user')
           ->select('device_id')
           ->where('delivery_boy_id', $delivery_boy_id)
           ->get();
           
      foreach($registers as $regs){
             if($regs->device_id!=""){
                     $registatoin_ids[] = $regs->device_id;
                     $result = $this->send_notification($regs->device_id, $message);
             }
      } 
        return redirect()->back()->withErrors('Notification sent');
      }
   
    
  
      public function send_notification($registatoin_ids, $message) {
        
     
        
       
            $fields = array(
                        'to' => $registatoin_ids,
                        'notification' => $message,
                        'priority' => 'high',
                        'content_available' => true
                    );

        
      return  $this->send($fields);
    }
   
   
    public function send($fields){
      
        $url = 'https://fcm.googleapis.com/fcm/send';
        
       $api_key = "AAAAlOsLxCY:APA91bFZDjaj1MjY3ihA_sKtKPD-MzDh97m_4FJjFgFxoOE8JbJkHsT8JjbWu3s1C7xXoMnJzIHa2_3AcVrM4Dr7aTBZN2lcPkayIdCPKEeik7BBULzjH3R4WVjxytrqo1szZojl9Ila";
        
        
        $headers = array(
            'Authorization: key=' .$api_key ,
            'Content-Type: application/json'
        );
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        
        // Close connection
        curl_close($ch);
        
        return $result;
        

    }
 
    
    
}