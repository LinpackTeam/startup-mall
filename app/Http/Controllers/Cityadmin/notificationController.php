<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\Carbon;


class notificationController extends Controller
{
  
   public function sendnotificationtodeliveryboy(Request $request) {
       $cityadmin_email=Session::get('cityadmin');
    
    	  $cityadmin=DB::table('cityadmin')
    			->where('cityadmin_email',$cityadmin_email)
    			->first();	
 
        return view('cityadmin.send_notification', compact("cityadmin_email", "cityadmin"));
   }
   
 
      public function notification2(Request $request) {
    $message= $request->message;    
    $delivery_boy_id = $request->delivery_boy_id;    
       $message=array('title' => 'BOSS', 'body' => $message ,'sound'=>'Default','image'=>'Notification Image');
        $registers = DB::table('delivery_boy')
           ->select('device_id')
           ->where('delivery_boy_id', $delivery_boy_id)
           ->get();
           
      foreach($registers as $regs){
             if($regs->device_id!=""){
                     $registatoin_ids[] = $regs->device_id;
                     $result = $this->send_notification($regs->device_id, $message);
             }
      } 
        return redirect()->back()->withErrors('Notification sent successfully to delivery boy');
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
        $cityadmin=DB::table('fcm_key')
    			->select('dboy_app_key')
    			->first();
        
       $api_key = $cityadmin->dboy_app_key;
        
        
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