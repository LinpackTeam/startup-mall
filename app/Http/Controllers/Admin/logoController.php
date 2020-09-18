<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class logoController extends Controller
{
    public function Editlogo(Request $request)
{
	 $admin_email=Session::get('admin');
	 $logo= DB::table('logo')
                ->first();
     $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();
	 return view('admin.logo.Editlogo',compact("admin_email","logo","admin"));
}
public function Updatelogo(Request $request)
{

        $logo_name = $request->logo_name;
        $old_logo_image = $request->old_logo_image;
        $date=date('d-m-y');
         
        // $this->validate(
        //     $request,
        //         [
        //             'logo_name' => 'required',
                    
        //             'logo_image' => 'mimes:jpeg,png,jpg|max:400',
        //             'old_logo_image'=>'required',
        //         ],
        //         [
        //             'logo_name.required' => 'Enter logo name.',
                    
        //             'old_logo_image.required' => 'choose picture.',
        //         ]
        // );

        $getImage = DB::table('logo')
                    ->first();

        $image = $getImage->logo_image;  

        if($request->hasFile('logo_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $logo_image = $request->logo_image;
            $fileName = date('dmyhisa').'-'.$logo_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $logo_image->move('logo/image/'.$date.'/', $fileName);
            $logo_image = 'logo/image/'.$date.'/'.$fileName;
        }
        else{
            $logo_image = $old_logo_image;
        }

        $update = DB::table('logo')
                ->update(['logo_name'=>$logo_name, 'logo_image'=>$logo_image]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
    
	

}

