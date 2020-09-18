<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class CityController extends Controller
{
    public function city(Request $request)
    {
    	

                 $admin_email=Session::get('admin');
        
                    $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	         $city= DB::table('city')
    	 		          ->get();
    	         return view('admin.city.city',compact("admin_email","city","admin"));



    }
    public function Addcity(Request $request)
    {
         $admin_email=Session::get('admin');
         $admin=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->first();
    	return view('admin.city.Addcity',compact("admin_email","admin"));

    }
    public function AddInsertcity(Request $request)
    {
    	
    	$city_name=$request->city_name;
    	$city_pincode=$request->city_pincode;
        $created_at=date('d-m-Y h:i a');;
        $date = date('d-m-Y');
        $address = str_replace(" ", "+", $city_name);
        $address1 = str_replace("-", "+", $address);
        

     //   $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=AIzaSyBQ-YSVmQS8h0Pv3hs_YwLZ65ifZqZ23X0"));

       // $location = json_encode(array("lat"=>$response->results[0]->geometry->location->lat, "lng"=>$response->results[0]->geometry->location->lng));
        
       //  $lat = $response->results[0]->geometry->location->lat;
        // $lng = $response->results[0]->geometry->location->lng;
         $lat='12.222l';
         $lng='45.123';

      $insert = DB::table('city')
    				->insert(['city_name'=>$city_name,'city_pincode'=>$city_pincode, 'lat'=>$lat, 'lng'=>$lng, 'created_at'=>$created_at]);
     return redirect()->back()->withErrors('successfully');

}
     
    public function Editcity(Request $request)
{
	 $admin_email=Session::get('admin');
	 $city_id=$request->id;
	 $city= DB::table('city')
	            ->where('city_id',$city_id)
                ->first();
     $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
	 return view('admin.city.Editcity',compact("admin_email","city","city_id","admin"));
}
public function Updatecity(Request $request)
{
    
        
        $city_id = $request->id;
        $city_name = $request->city_name;
        $city_pincode=$request->city_pincode;
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
         
        $address = str_replace(" ", "+", $city_name);
        $address1 = str_replace("-", "+", $address);
        

        $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=AIzaSyBQ-YSVmQS8h0Pv3hs_YwLZ65ifZqZ23X0"));

       // $location = json_encode(array("lat"=>$response->results[0]->geometry->location->lat, "lng"=>$response->results[0]->geometry->location->lng));
        
         $lat = $response->results[0]->geometry->location->lat;
         $lng = $response->results[0]->geometry->location->lng;
         
        $this->validate(
            $request,
                [
                    'city_name' => 'required',
                    'city_pincode'=>'required',
                    
                ],
                [
                    'city_name.required' => 'Enter city name.',
                    'city_pincode.required'=> 'Enter City Pincode',
                    
                ]
        );


        $update = DB::table('city')
                                ->where('city_id', $city_id)
                                ->update(['city_name'=>$city_name, 'city_image'=>$city_image,'lat'=>$lat, 'lng'=>$lng, 'updated_at'=>$updated_at]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
     public function Deletecity(Request $request)
    {
        $city_id=$request->id;

        $getfile=DB::table('city')
                ->where('city_id',$city_id)
                ->first();

        

    	$delete=DB::table('city')->where('city_id',$request->id)->delete();
        if($delete)
        {
         
        return redirect()->back()->withErrors('delete successfully');

        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }

    }
	

}

