<?php

namespace App\Http\Controllers\resource_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class registrationController extends Controller
{
	public function registration(Request $request)
    {
		return view('resource_team.registration.registration');
	}
      public function fillregistration(Request $request)
    {
      
       
        $name = $request->name;
        $email=$request->email;
		$password=Hash::make($request->password);
        $address=$request->address;
        $city=$request->city;
        $contact=$request->contact;
        $insert = DB::table('resource_team')
                ->insert(['name'=>$name,'login_id'=>$email,'password'=>$password,'address'=>$address,'city'=>$city,'contact'=>$contact]);
				
        $this->validate(
            $request,
                [
                    'name'=>'required',
                    'email'=>'required',
                ],
                [
                    'name.required'=> 'enter  name',
                    'email.required'=>'enter  email',
                ]
        );
 if($insert){
 return redirect()->back()->withErrors('Registered Successfully');
 }
 else{
	return redirect()->back()->withErrors('try again');
	  }
    
    }
}