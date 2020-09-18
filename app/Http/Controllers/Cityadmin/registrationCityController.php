<?php

namespace App\Http\Controllers\Cityadmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;

class registrationCityController extends Controller
{
	public function registrationcityadmin(Request $request)
	
    {    
		$categories=DB::table('start_upcategory')
                      ->get();
		$form_data=DB::table('temp_form_data')
		              ->where('startup_id',session::get('cityadmin_id'))
                      ->get();
					  $email=session::get('cityadmin');
					  
	  return view('cityadmin.registration',compact("categories","form_data","email"));	
	}
      public function fillcityregistration(Request $request)
    {
         
        $name = $request->startup_name;
		$fname=$request->founder_name;
        $email=$request->email;
		$address=$request->address;
        $doi=$request->date_inc;
        $brief=$request->brief;
		$solution=$request->solution;
		$team_details=$request->team_details;
		$dipp_number=$request->dipp_number;
		$fac_address=$request->fac_address;
		$website=$request->website;
		$GSTinnumber=$request->GSTinnumber;
		$MSMEnum=$request->MSMEnum;
		$socialmedia=$request->social_website;
        $contact=$request->contact;
		$PAN=$request->PAN;
		$bank_name=$request->bank_name;
		$branch=$request->branch;
		$acc_name=$request->acc_name;
		$acc_no=$request->acc_no;
		$ifsc_code=$request->ifsc_code;
		$category = $request->category;		
       $insert1 = DB::table('form_data')
                ->insertGetId(['name_startup'=>$name,'name_founder'=>$fname,'email'=>$email,'address'=>$address,'date_incorporation'=>$doi,'contact'=>$contact,'brief'=>$brief,'team_details'=>$team_details,'dipp_number'=>$dipp_number,'fac_address'=>$fac_address,'website'=>$website,'socialmedia'=>$socialmedia,'PAN'=>$PAN,'bank_name'=>$bank_name,'branch'=>$branch,'acc_holder_name'=>$acc_name,'acc_num'=>$acc_no,'ifsc_code'=>$ifsc_code,'solution'=>$solution,'udhyog_aadhar'=>$MSMEnum,'startup_id'=>session::get('cityadmin_id')]);
		$insert1=session::get('cityadmin_id');	
		$count=count($category);
				 for($i=0;$i<$count;$i++)
				 {
         $insert=DB::table('start_upcategories')
		  ->insert(['category_name'=>$category[$i],'startup_id'=>$insert1]);
				 }		
		$doi_img=$request->INC_proof;
		$fileName = date('d-m-Y h:i a').'-'.$doi_img->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $doi_img->move('public/startupdocs/success/INC_proof/'.$insert1.'/', $fileName);
        $doi_img = 'INC_proof/'.$insert1.'/'.$fileName;
		
		$dipp_img=$request->DIPP;
		if(!empty($DIPP)){
		$fileName = date('d-m-Y h:i a').'-'.$dipp_img->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $dipp_img->move('public/startupdocs/success/DIPP/'.$insert1.'/', $fileName);
        $dipp_img = 'DIPP/'.$insert1.'/'.$fileName;
		}
		$adress_proof=$request->address_proof;
		$fileName = date('d-m-Y h:i a').'-'.$adress_proof->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $adress_proof->move('public/startupdocs/success/address_proof/'.$insert1.'/', $fileName);
        $adress_proof = 'addres_proof/'.$insert1.'/'.$fileName;
		
		$fac_img1=$request->fac_img1;
		$fileName = date('d-m-Y h:i a').'-'.$fac_img1->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $fac_img1->move('public/startupdocs/success/fac_img/'.$insert1.'/', $fileName);
        $fac_img1 = 'fac_img/'.$insert1.'/'.$fileName;
		
		$fac_img2=$request->fac_img2;
		$fileName = date('d-m-Y h:i a').'-'.$fac_img2->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $fac_img2->move('public/startupdocs/success/fac_img/'.$insert1.'/', $fileName);
        $fac_img2 = 'fac_img/'.$insert1.'/'.$fileName;
		
		$fac_img3=$request->fac_img3;
		$fileName = date('d-m-Y h:i a').'-'.$fac_img3->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $fac_img3->move('public/startupdocs/success/fac_img/'.$insert1.'/', $fileName);
        $fac_img3 = 'fac_img/'.$insert1.'/'.$fileName;
		
		$fac_img4=$request->fac_img4;
		$fileName = date('d-m-Y h:i a').'-'.$fac_img4->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $fac_img4->move('public/startupdocs/success/fac_img/'.$insert1.'/', $fileName);
        $fac_img4 = 'fac_img/'.$insert1.'/'.$fileName;
		
		$GSTIN=$request->GSTIN;
		if(!empty($GSTIN)){
		$fileName = date('d-m-Y h:i a').'-'.$GSTIN->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $GSTIN->move('public/startupdocs/success/GSTIN/'.$insert1.'/', $fileName);
        $GSTIN = 'GSTIN/'.$insert1.'/'.$fileName;
		}
		$MSME=$request->MSME;
		if(!empty($MSME)){
		$fileName = date('d-m-Y h:i a').'-'.$MSME->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $MSME->move('public/startupdocs/success/MSME/'.$insert1.'/', $fileName);
        $MSME = 'MSME/'.$insert1.'/'.$fileName;
		}
		$PAN_img=$request->PAN_img;
		$fileName = date('d-m-Y h:i a').'-'.$PAN_img->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $PAN_img->move('public/startupdocs/success/PAN_img/'.$insert1.'/', $fileName);
        $PAN_img = 'PAN_img/'.$insert1.'/'.$fileName;
        /*$this->validate(
            $request,
                [
                    'name'=>'required',
                    'email'=>'required',
                ],
                [
                    'name.required'=> 'enter  name',
                    'email.required'=>'enter  email',
                ]
        );*/
		$insert = DB::table('images')
                ->insert(['path'=>$doi_img,'type'=>'dateofinc']);
				if(!empty($DIPP)){
		$insert = DB::table('images')
                ->insert(['path'=>$dipp_img,'type'=>'DIPP']);}
         $insert = DB::table('images')
                ->insert(['path'=>$adress_proof,'type'=>'adress_proof']);
		$insert = DB::table('images')
                ->insert(['path'=>$fac_img1,'type'=>'fac_img']);
		$insert = DB::table('images')
                ->insert(['path'=>$fac_img2,'type'=>'fac_img']);
		$insert = DB::table('images')
                ->insert(['path'=>$fac_img3,'type'=>'fac_img']);
		$insert = DB::table('images')
                ->insert(['path'=>$fac_img4,'type'=>'fac_img']);
				if(!empty($GSTIN)){
		$insert = DB::table('images')
                ->insert(['path'=>$GSTIN,'type'=>'GSTIN']);}
				if(!empty($MSME)){
		$insert = DB::table('images')
                ->insert(['path'=>$MSME,'type'=>'MSME']);}
		$insert = DB::table('images')
                ->insert(['path'=>$PAN_img,'type'=>'PAN_img']);         
 
 if($insert){
	          $update=DB::table('cityadmin')
			  
			         ->where('city_id',session::get('cityadmin_id'))
					 ->update(['status'=>1]);
    return redirect()->route('regsucess');
    }
 else{
	return redirect()->back()->withErrors('try again');
	  }
    
    }
	public function saveregistration(Request $request){
		
	$name = $request->startup_name;
		$fname=$request->founder_name;
        $email=$request->email;
		$address=$request->address;
        $doi=$request->date_inc;
        $brief=$request->brief;
		$solution=$request->solution;
		$team_details=$request->team_details;
		$dipp_number=$request->dipp_number;
		$fac_address=$request->fac_address;
		$website=$request->website;
		$GSTinnumber=$request->GSTinnumber;
		$MSMEnum=$request->MSMEnum;
		$socialmedia=$request->social_website;
        $contact=$request->contact;
		$PAN=$request->PAN;
		$bank_name=$request->bank_name;
		$branch=$request->branch;
		$acc_name=$request->acc_name;
		$acc_no=$request->acc_no;
		$ifsc_code=$request->ifsc_code;
		$category = $request->category;
		
        $update = DB::table('temp_form_data')
                ->update(['name_startup'=>$name,'name_founder'=>$fname,'email'=>$email,'address'=>$address,'date_incorporation'=>$doi,'contact'=>$contact,'brief'=>$brief,'team_details'=>$team_details,'dipp_number'=>$dipp_number,'fac_address'=>$fac_address,'website'=>$website,'socialmedia'=>$socialmedia,'PAN'=>$PAN,'bank_name'=>$bank_name,'branch'=>$branch,'acc_holder_name'=>$acc_name,'acc_num'=>$acc_no,'ifsc_code'=>$ifsc_code,'solution'=>$solution,'udhyog_aadhar'=>$MSMEnum]);
	}
	public function regsucess(){
		return view('cityadmin.regsuccess');
	}
}