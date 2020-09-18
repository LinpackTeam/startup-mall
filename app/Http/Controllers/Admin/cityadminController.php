<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class cityadminController extends Controller
{
    public function cityadmin(Request $request)
    {
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $cityadmin= DB::table('cityadmin')
        ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
        ->get();
        // var_dump($cityadmin);
        return view('admin.cityadmin.cityadmin',compact("admin_email","cityadmin","admin"));
    }
    
     public function Addcityadmin(Request $request)
    {
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
                
        $getCityAdmin = DB::table('cityadmin')->pluck('city_id')->toArray();
        
        $city= DB::table('city')
                ->whereNotIn('city_id', $getCityAdmin)
                ->get();
                
         return view('admin.cityadmin.addcityadmin',compact("admin_email","city","admin"));
    }
    
    
        public function AddNewcityadmin(Request $request)
    {
        
        $cityadmin_id=$request->id;
        $city_name=$request->city_name;
        $cityadmin_name=$request->cityadmin_name;
        $cityadmin_email=$request->cityadmin_email;
        $cityadmin_phone=$request->cityadmin_phone;
        $password=$request->password1;
        $password2=$request->password2;
        $address = $request->cityadmin_address; 
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        

        $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=AIzaSyBQ-YSVmQS8h0Pv3hs_YwLZ65ifZqZ23X0"));

       // $location = json_encode(array("lat"=>$response->results[0]->geometry->location->lat, "lng"=>$response->results[0]->geometry->location->lng));
        
         $lat = $response->results[0]->geometry->location->lat;
         $lng = $response->results[0]->geometry->location->lng;
                    
        
        $old_cityadmin_image=$request->old_cityadmin_image;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $cityadmin_image = $request->cityadmin_image;
        $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $cityadmin_image->move('cityadmin_img/images/'.$date.'/', $fileName);
        $cityadmin_image = 'cityadmin_img/images/'.$date.'/'.$fileName;
        $checkcityadmin= DB::table('cityadmin')
                      ->where('city_id', $city_name)
                      ->get();
        if(count($checkcityadmin)>0){
            return redirect()->back()->withErrors('cityadmin already created for the city');
        }
       else{
        if($password!=$password2){
             return redirect()->back()->withErrors('password are not same');
        }

       else{
        $new_pass=Hash::make($password);
        $insert = DB::table('cityadmin')
                  ->insertGetId(['city_id'=>$city_name,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,'lat'=>$lat,'lng'=>$lng, 'created_at'=>$created_at]);
                  
            DB::table('incentive_amount')
     		         ->insert(['cityadmin_id'=>$insert]);          
     
     return redirect()->back()->withErrors('successfully Created');

    }
    }
   } 
    public function Editcityadmin(Request $request)
    {
    	
       $cityadmin_id=$request->id;
    	 $admin_email=Session::get('admin');
    	 
    	 $getCityAdmin = DB::table('cityadmin')->where('cityadmin_id', '!=', $cityadmin_id)->pluck('city_id')->toArray();
    	 
    	 $city=DB::table('city')
    	        ->whereNotIn('city_id', $getCityAdmin)
                ->get();
                
         $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();       
    	 $cityadmin= DB::table('cityadmin')
    	 		  ->where('cityadmin_id',$cityadmin_id)
    	 		  ->first();
    	 return view('admin.cityadmin.Editcityadmin',compact("admin_email","admin","city","cityadmin_id","cityadmin"));


    }
    public function Updatecityadmin(Request $request)
{
    
        $cityadmin_id=$request->id;
        $city_name=$request->city_name;
        $cityadmin_name=$request->cityadmin_name;
        $cityadmin_email=$request->cityadmin_email;
        $cityadmin_phone=$request->cityadmin_phone;
        $password=$request->password1;
        $password2=$request->password2;
        $old_cityadmin_image=$request->old_cityadmin_image;
        $address = $request->cityadmin_address; 
        $addres = str_replace(" ", "+", $address);
        $address1 = str_replace("-", "+", $addres);
        

        $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=AIzaSyBQ-YSVmQS8h0Pv3hs_YwLZ65ifZqZ23X0"));

       // $location = json_encode(array("lat"=>$response->results[0]->geometry->location->lat, "lng"=>$response->results[0]->geometry->location->lng));
        
         $lat = $response->results[0]->geometry->location->lat;
         $lng = $response->results[0]->geometry->location->lng;
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
        

        $getImage = DB::table('cityadmin')
                     ->where('cityadmin_id',$cityadmin_id)
                    ->first();

        $image = $getImage->cityadmin_image;  
      
       if($password!=$password2){
             return redirect()->back()->withErrors('password are not same');
        }

       else{
        if($request->hasFile('cityadmin_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $cityadmin_image = $request->cityadmin_image;
            $fileName = date('dmyhisa').'-'.$cityadmin_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $cityadmin_image->move('cityadmin_img/images/'.$date.'/', $fileName);
            $cityadmin_image = 'cityadmin_img/images/'.$date.'/'.$fileName;
        }
        else{
            $cityadmin_image = $old_cityadmin_image;
        }
        
         if($password!="" && $password2!="")
        {
            if($password!=$password2){
                return redirect()->back()->withErrors('password are not same');
            }
            else
            {
                $new_pass=Hash::make($password);
                $value=array('city_id'=>$city_name,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email,'cityadmin_phone'=> $cityadmin_phone, 'cityadmin_pass'=>$new_pass,'cityadmin_address'=>$address,'lat'=>$lat,'lng'=>$lng, 'updated_at'=>$updated_at);
            }
            
        }
        else
        {
            $value=array('city_id'=>$city_name,'cityadmin_name'=>$cityadmin_name,'cityadmin_image'=>$cityadmin_image,'cityadmin_email'=> $cityadmin_email, 'cityadmin_phone'=> $cityadmin_phone,'cityadmin_address'=>$address,'lat'=>$lat,'lng'=>$lng, 'updated_at'=>$updated_at);
        }

        $update = DB::table('cityadmin')
                 ->where('cityadmin_id', $cityadmin_id)
                 ->update($value);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
}    

  public function deletecityadmin(Request $request)
    {
        $cityadmin_id=$request->id;

        $getfile=DB::table('cityadmin')
                ->where('cityadmin_id',$cityadmin_id)
                ->first();

        $cityadmin_image=$getfile->cityadmin_image;

    	$delete=DB::table('cityadmin')->where('cityadmin_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($cityadmin_image)){
                unlink($cityadmin_image);
            }
         
        return redirect()->back()->withErrors('delete successfully');

        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }

    }
    
    public function secretlogin(Request $request)
    {
        $id=$request->id;
        $checkcityadminLogin = DB::table('cityadmin')
    	                   ->where('cityadmin_id',$id)
    	                   ->first();

    	if($checkcityadminLogin){

           session::put('cityadmin',$checkcityadminLogin->cityadmin_email);
           return redirect()->route('cityadmin-index');
         
    	}else
         {
         	return redirect()->route('cityadmin')->withErrors('Something Wents Wrong');
         }
    }
    
}
