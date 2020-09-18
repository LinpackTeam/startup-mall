<?php

namespace App\Http\Controllers\cityadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class cityadminProfileController extends Controller
{
    public function cityadminProfile(Request $request)
    {
    	 
    	 $admin_email=Session::get('cityadmin');
    	 $profile= DB::table('cityadmin')
    	 		   ->where('cityadmin_email',$admin_email)
    	 		   ->first();
    	
           return view('cityadmin.profile',compact("admin_email","profile"));
      

    }
   
   
      public function Editcityadmin(Request $request)
{
	 $cityadmin_email=Session::get('cityadmin');
	 $cityadmin_id=$request->id;
     $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email',$cityadmin_email)
                ->first();
	 return view('cityadmin.editcityadmin.editcityadmin',compact("cityadmin_email","cityadmin_id","cityadmin"));
}
   

    public function cityadminUpdateProfile(Request $request)
    {
        $cityadmin_email=Session::get('cityadmin');
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $pass = $request->pass;
        $phone = $request->phone;
        $password2 = $request->password2;
        $date=date('d-m-y');
        if($pass!=$password2){
            return redirect()->back()->withErrors('password does not match');
        }
        else{
        $this->validate(
            $request,
                [
                   // 'name' => 'required',
                    //'email' => 'required',
                    //'admin_image' => 'mimes:jpeg,png,jpg|max:400',
                    //'old_admin_image'=>'required',
                ],
                
        );
        
        if($pass!="" && $password2!="")
        {
            if($pass!=$password2){
                return redirect()->back()->withErrors('password are not same');
            }
            else
            {
                $new_pass=Hash::make($pass);
                $value=array('cityadmin_name'=>$name, 'cityadmin_email'=>$email,'cityadmin_pass' =>$new_pass, 'cityadmin_phone'=>$phone);
            }
            
        }
        else
        {
            $value=array('cityadmin_name'=>$name, 'cityadmin_email'=>$email,'cityadmin_pass' =>$pass, 'cityadmin_phone'=>$phone);
        }

        $adminChangeProfile =DB::table('cityadmin')
                                ->where('cityadmin_email', $cityadmin_email)
                                ->update($value); 

        if($adminChangeProfile){

             session::put('cityadmin',$email);

            return redirect()->back()->withErrors('profile updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
    }
}
    public function cityadminChangePass(Request $request)
    {
        $admin_email=Session::get('cityadmin');
         $pass= DB::table('cityadmin')
                   ->where('cityadmin_id',$admin_email)
                   ->first();
        
           return view('cityadmin.change_pass_c',compact("admin_email","pass"));
       
    }

   public function cityadminChangePassword(Request $request)
    {
       // return redirect()->back();
        
        $this->validate(
            $request,
                [
                    'current_pass' => 'required',
                    'new_pass' => 'required',
                ],
                [
                    'current_pass.required' => 'Enter current password.',
                    'new_pass.required' => 'Enter new password.',
                ]
           );

        $admin_id = $request->id;
        $current_pass = $request->current_pass;

        $getAdmin = DB::table('cityadmin')
                    ->where('cityadmin_id', $admin_id)
                    ->first();

        if(Hash::check($current_pass,$getAdmin->password))
            {
            $new_pass = Hash::make($request->new_pass);
            $updated_at = date("d-m-y h:i a");

            $adminChangePassword = DB::table('cityadmin')
                                    ->where('cityadmin_id', $admin_id)
                                    ->update(['password'=>$new_pass,'updated_at'=>$updated_at]);

            if($adminChangePassword)
            {
                

                return redirect()->back()->withErrors("password changed! login again.");
            }
            else{
                return redirect()->back()->withErrors("something wents wrong.");
            }
        }
        else{
            return redirect()->back()->withErrors("current password does not match.");
        }
     }
     public function cityadminLogout(Request $request)
     {
          $request->session()->flush();
           return redirect()->route('cityadminlogin')->withErrors("Enter email and password");

     }  
}

 