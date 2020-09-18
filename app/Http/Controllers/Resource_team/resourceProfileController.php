<?php

namespace App\Http\Controllers\Resource_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class resourceProfileController extends Controller
{
    public function resourceteamProfile(Request $request)
    {
    	 
    	 $admin_email=Session::get('resource_team');
    	 $profile= DB::table('resource_team')
    	 		   ->where('login_id',$admin_email)
    	 		   ->first();
    	
           return view('resource_team.profile',compact("admin_email","profile"));
      

    }
   
   
      public function Editresourceteam(Request $request)
{
	 $admin_email=Session::get('resource_team');
	 $admin_id=$request->id;
     $admin=DB::table('resource_team')
                ->where('login_id',$admin_email)
                ->first();
	 return view('resource_team.editresource_team.editresource_team',compact("admin_email","admin_id","admin"));
}
   

    public function resourceteamUpdateProfile(Request $request)
    {
        
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $pass = $request->pass;
        $phone = $request->phone;
        $phone2 = $request->phone2;
        $password2 = $request->password2;
        $date=date('d-m-y');
        if($pass!=$password2){
            return redirect()->back()->withErrors('password are not same');
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
                $value=array('name'=>$name, 'login_id'=>$email,'password' =>$new_pass, 'contact'=>$phone,'phone2'=>$phone2);
            }
            
        }
        else
        {
            $value=array('name'=>$name, 'login_id'=>$email,'password' =>$pass, 'contact'=>$phone,'phone2'=>$phone2);
        }

        $adminChangeProfile =DB::table('resource_team')
                                ->where('id', $id)
                                ->update($value); 

        if($adminChangeProfile){

             session::put('resource_team',$email);

            return redirect()->back()->withErrors('profile updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
    }
}
    public function resourceteamChangePass(Request $request)
    {
        $admin_email=Session::get('resource_team');
         $pass= DB::table('resource_team')
                   ->where('login_id',$admin_email)
                   ->first();
        
           return view('resource_team.change_pass_r',compact("admin_email","pass"));
       
    }

   public function resourceteamChangePassword(Request $request)
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

        $getAdmin = DB::table('resource_team')
                    ->where('id', $admin_id)
                    ->first();

        if(Hash::check($current_pass,$getAdmin->password))
            {
            $new_pass = Hash::make($request->new_pass);
            $updated_at = date("d-m-y h:i a");

            $adminChangePassword = DB::table('resource_team')
                                    ->where('id', $admin_id)
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
     public function resourceteamLogout(Request $request)
     {
          $request->session()->flush();
           return redirect()->route('resourceteamlogin')->withErrors("Enter email and password");

     }
}

 