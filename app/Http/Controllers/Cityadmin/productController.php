<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class ProductController extends Controller

{
	public function send_email($receiver_email,$subject,$msg)
	{
$headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($receiver_email,$subject,$msg,$headers))
echo "success";
else
echo "failed";	
		
	}
    public function product(Request $request)
    {
    if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $product= DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                 ->where('product.startup_id', $cityadmin->city_id)
                ->get();
				
				
        $currency =  DB::table('currency')
               ->select('currency_sign')
                ->get();           
        return view('cityadmin.product.product',compact("cityadmin_email","product","cityadmin","currency"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
     public function Addproduct(Request $request)
    {
      if(Session::has('cityadmin'))
      {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $subcat= DB::table('subcat')
                ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                ->where('startup_id', $cityadmin->city_id)
                ->get();
           
 $states= DB::table('states_available')
                
              ->select('state')
             ->groupBy('state')
                ->get();		   
            
         return view('cityadmin.product.addproduct',compact("cityadmin_email","subcat","cityadmin","states"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
    
    
   public function AddNewproduct(Request $request)
    {
     if(Session::has('cityadmin'))
      {  
        $startup_id=Session::get('cityadmin_id');
		$startup_name=Session::get('startup_name');
		$email=Session::get('startup_email');
        $subcat_name=$request->subcat_name;
        $product_name=$request->product_name;
        $brand_name=$request->brand_name;
        $category = $request->category;
       if(empty($category)){
			return redirect()->back()->withErrors(' Add Technical Specification');
		}
        $value = $request->value;
		if(empty($value)){
			return redirect()->back()->withErrors(' Add Technical Specification');
		}
        $mrp = $request->mrp;
        $disc = $request->discount;
        $unit=$request->unit;
        $stock=$request->stock;
        $qty=$request->qty;
        $weight=$request->weight;
		$main_image=$request->main_image;
        $product_1=$request->img_1;
        $product_2=$request->img_2;
        $product_3=$request->img_3;
        $product_4=$request->img_4;
        $product_5=$request->img_5;
		$vedio=$request->vedio;
        $product_description =$request->product_description;
        $license=$request->license;
        $gov=$request->gov;
        $noc=$request->noc;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
     if($product_name&&$brand_name&&$category&&$value&&$mrp&&$unit&&$stock&&$qty&&$weight&&$main_image&&$product_1&&$product_2&&$product_3&&$product_description){
        $insert1 = DB::table('product')
                ->insertGetId(['startup_id'=>$startup_id,'subcat_id'=>$subcat_name,'weight'=>$weight,'product_name'=>$product_name,'brand_name'=>$brand_name,'mrp'=>$mrp,'discount_price'=>$disc,'unit'=>$unit,'stock'=>$stock,'qty'=> $qty,'description'=>$product_description,'status'=>'pending_for_verification','created_at'=>$created_at]);
				
				$count=count($category);
				 for($i=0;$i<$count;$i++)
				 {
         $insert=DB::table('technical_details')
		  ->insert(['product_id'=>$insert1,'category'=>$category[$i],'value'=>$value[$i]]);
				 }
                
        $license = $request->license;
        if(!empty($license))
        {
        $fileName = date('d-m-Y h:i a').'-'.$license->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $license->move('public/images/product/'.$insert1.'/', $fileName);
        $license = 'images/product/'.$insert1.'/'.$fileName;
        }
         $gov = $request->gov;
        if(!empty($gov)){
        $gov = $request->gov;
        $fileName = date('d-m-Y h:i a').'-'.$gov->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $gov->move('public/images/product/'.$insert1.'/', $fileName);
        $gov = 'images/product/'.$insert1.'/'.$fileName;
        }
        $noc=$request->noc;
        if(!empty($noc)){
        $noc = $request->noc;
        $fileName = date('d-m-Y h:i a').'-'.$noc->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $noc->move('public/images/product/'.$insert1.'/', $fileName);
        $noc = 'images/product/'.$insert1.'/'.$fileName;
        }
		$main_image = $request->main_image;
		if(!empty($main_image)){
        $fileName = date('d-m-Y h:i a').'-'.$main_image->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $main_image->move('public/images/product/'.$insert1.'/', $fileName);
        $main_image = 'images/product/'.$insert1.'/'.$fileName;
		}
        $product_1 = $request->img_1;
		if(!empty($product_1)){
        $fileName = date('d-m-Y h:i a').'-'.$product_1->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_1->move('public/images/product/'.$insert1.'/', $fileName);
        $product_1 = 'images/product/'.$insert1.'/'.$fileName;
		        $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$product_1,'type'=>'p_img']);
       
		}
        
        $product_2 = $request->img_2;
		if(!empty($product_2)){
        $fileName = date('d-m-Y h:i a').'-'.$product_2->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_2->move('public/images/product/'.$insert1.'/', $fileName);
        $product_2 = 'images/product/'.$insert1.'/'.$fileName;
		 $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$product_2,'type'=>'p_img']);
      
        }
		
        $product_3 = $request->img_3;
		if(!empty($product_3)){
        $fileName = date('d-m-Y h:i a').'-'.$product_3->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_3->move('public/images/product/'.$insert1.'/', $fileName);
        $product_3 = 'images/product/'.$insert1.'/'.$fileName;
			 $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$product_2,'type'=>'p_img']);
        }
          $product_4 = $request->img_4;
		  if(!empty($product_4)){
        $fileName = date('d-m-Y h:i a').'-'.$product_4->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_4->move('public/images/product/'.$insert1.'/', $fileName);
        $product_4 = 'images/product/'.$insert1.'/'.$fileName;
			 $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$product_2,'type'=>'p_img']);
		  }		  
        $product_5 = $request->img_5;
		if(!empty($product_5)){
        $fileName = date('d-m-Y h:i a').'-'.$product_5->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_5->move('public/images/product/'.$insert1.'/', $fileName);
        $product_5 = 'images/product/'.$insert1.'/'.$fileName;
			 $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$product_2,'type'=>'p_img']);
		}
        
        $this->validate(
            $request,
                [
                    'product_name'=>'required',
                    'subcat_name'=>'required',
                ],
                [
                    'product_name.required'=> 'enter product name',
                    'subcat_name.required'=>'select subcat name',
                ]
        );

//	$delete=DB::table('product_img')->where('category_id',$request->category_id)->delete();
        
        $insert = DB::table('product')
		       ->where('product_id',$insert1)
                ->update(['image_path'=>$main_image]);
			if(!empty($vedio)){		

			
       $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$vedio,'type'=>'video']);
			}

         if(!empty($noc)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$noc,'type'=>'noc']);
         }
         if(!empty($gov)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$gov,'type'=>'gov']);
         }
        if(!empty($license)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$insert1,'path'=>$license,'type'=>'license']);
        }
	 
    // return redirect()->back()->withErrors('successfully added');
	 $msg='<!DOCTYPE html>
<html>
    <head>
        <title>Product-add</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">

    <style> 
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
     <body style="font-family:Balsamiq Sans, cursive">
        <div class="container">
            <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
	  <img src="'.url("public/email_images/product_add.jpg").'" class="img-responsive thumbnail">
               
            <h4 style="color: #070F64"> Hey '.$startup_name.'!</h4><br>
                <div class="col-sm-4 col-md-4">
                
                </div> 
                 <div class="col-sm-8 col-md-8">
                <ul>
                <li>Product Name : '.$product_name.'</li>
                <li>Discription : '.$product_description.'</li>
                </ul>
                </div>
                <div class="clearfix"></div>
            <p> Your product details have been received by us.
              </p>

            <p>If everything is fine with all the relevant details, your start-up would be live on our portal within the next 48 hours.</p><br>
Thanks and Regards,<br>
Admin <br>
 (+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
       <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
            <center>
            <div class=" container col-xs-12">
                <i>“Innovation is often misunderstood with only being a <b>Discovery</b> or an <b>Invention</b>. Innovation can be as simple as different packaging and as complex as rocket science” </i>
            </div>
            </center>
        </div>
             </div>
    </body>
</html>
';
    $subject='Product-Added';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('product added successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
	  
	  else
	  {
		  return redirect()->back()->withErrors('Please fill the mandatory fields');  
	  }
	  }else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('Try again');
	 }
    }
    
    public function Editproduct(Request $request)
    {
      if(Session::has('cityadmin'))
      {	
       $product_id=$request->id;
    	 $cityadmin_email=Session::get('cityadmin');
    	 
         $cityadmin=DB::table('cityadmin')
                ->where('cityadmin_email',$cityadmin_email)
                ->first();       
    	 $product= DB::table('product')
    	 		  ->where('product_id',$product_id)
    	 		  ->first();
	      $tech=DB::table('technical_details')
		        ->where('product_id', $product_id)
                ->get(); 
		$subcat= DB::table('subcat')
                ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                ->where('startup_id', $cityadmin->city_id)
                ->get();
    	 return view('cityadmin.product.Editproduct',compact("cityadmin_email","cityadmin","product","product_id","subcat","tech"));
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }

    }
    public function Updateproduct(Request $request)
   {
     if(Session::has('cityadmin'))
     {
		$startup_name=Session::get('startup_name');
		$email=Session::get('startup_email');
        $product_id=$request->id;
        $subcat_name=$request->subcat_name;
        $product_name=$request->product_name;
        $brand_name=$request->brand_name;
        $category = $request->category;
		if(empty($category)){
			return redirect()->back()->withErrors(' Add Technical Specification');
		}
        $value = $request->value;
		if(empty($value)){
			return redirect()->back()->withErrors(' Add Technical Specification');
		}
        $mrp = $request->mrp;
        $disc = $request->discount;
        $unit=$request->unit;
        $stock=$request->stock;
        $qty=$request->qty;
       $product_1=$request->img_1;
        $product_2=$request->img_2;
        $product_3=$request->img_3;
        $product_4=$request->img_4;
        $product_5=$request->img_5;
        $product_description =$request->product_description;
         $license=$request->license;
        $gov=$request->gov;
        $noc=$request->noc;
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        
        $update1 = DB::table('product')
                 ->where('product_id', $product_id)
                 ->update(['subcat_id'=>$subcat_name,'product_name'=>$product_name,'mrp'=>$mrp,'discount_price'=>$disc,'unit'=> $unit,'stock'=>$stock,'qty'=> $qty,'description'=>$product_description,'status'=>'pending_for_verification','updated_at'=>$updated_at]);
      			 if(is_array($category))
				 {$count=count($category);
				 for($i=0;$i<$count;$i++)
				 {
         $insert=DB::table('technical_details')
		  ->insert(['product_id'=>$product_id,'category'=>$category[$i],'value'=>$value[$i]]);
				 }
				 }
				
        $license = $request->license;
        if(!empty($license))
        {
        $fileName = date('d-m-Y h:i a').'-'.$license->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $license->move('public/images/product/'.$product_id.'/', $fileName);
        $license = 'images/product/'.$product_id.'/'.$fileName;
        }
         $gov = $request->gov;
        if(!empty($gov)){
        $gov = $request->gov;
        $fileName = date('d-m-Y h:i a').'-'.$gov->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $gov->move('public/images/product/'.$product_id.'/', $fileName);
        $gov = 'images/product/'.$product_id.'/'.$fileName;
        }
        $noc=$request->noc;
        if(!empty($noc)){
        $noc = $request->noc;
        $fileName = date('d-m-Y h:i a').'-'.$noc->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $noc->move('public/images/product/'.$product_id.'/', $fileName);
        $noc = 'images/product/'.$product_id.'/'.$fileName;
        }
        
        $product_1 = $request->img_1;
		
        if(!empty($product_1)){
        $fileName = date('d-m-Y h:i a').'-'.$product_1->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_1->move('public/images/product/'.$product_id.'/', $fileName);
        $product_1 = 'images/product/'.$product_id.'/'.$fileName;
		}
        
		
        $product_2 = $request->img_2;
		 if(!empty($product_2)){
        $fileName = date('d-m-Y h:i a').'-'.$product_2->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_2->move('public/images/product/'.$product_id.'/', $fileName);
        $product_2 = 'images/product/'.$product_id.'/'.$fileName;
		 }
        $product_3 = $request->img_3;
		 if(!empty($product_3)){
        $fileName = date('d-m-Y h:i a').'-'.$product_3->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_3->move('public/images/product/'.$product_id.'/', $fileName);
        $product_3 = 'images/product/'.$product_id.'/'.$fileName;
		 }
        
          $product_4 = $request->img_4;
		   if(!empty($product_4)){
        $fileName = date('d-m-Y h:i a').'-'.$product_4->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_4->move('public/images/product/'.$product_id.'/', $fileName);
        $product_4 = 'images/product/'.$product_id.'/'.$fileName;
		   }
        $product_5 = $request->img_5;
		 if(!empty($product_5)){
        $fileName = date('d-m-Y h:i a').'-'.$product_5->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_5->move('public/images/product/'.$product_id.'/', $fileName);
        $product_5 = 'images/product/'.$product_id.'/'.$fileName;
		 }
        
        $this->validate(
            $request,
                [
                    'subcat_name'=>'required',
                    'mrp'=>'required',

                ],
                [
                    'subcat_name.required'=>'select subcat name',
                    'mrp.required'=>'Enter the mrp',
                    
                ]
        );
        
       if(!empty($product_1)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$product_1,'type'=>'p_img']);
	   }
	    if(!empty($product_2)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$product_2,'type'=>'p_img']);
				  }
	    if(!empty($product_3)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$product_3,'type'=>'p_img']);
				  }
	    if(!empty($product_4)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$product_4,'type'=>'p_img']);
				  }
	    if(!empty($product_5)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$product_5,'type'=>'p_img']);
		}
         if(!empty($noc)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$noc,'type'=>'noc']);
         }
         if(!empty($gov)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$gov,'type'=>'gov']);
         }
        if(!empty($license)){
        $insert = DB::table('product_img')
                ->insert(['product_id'=>$product_id,'path'=>$license,'type'=>'license']);
        }

        if($update1){
		
		$msg='<!DOCTYPE html>
<html>
    <head>
        <title>Product-Update</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">

    <style> 
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
     <body style="font-family:Balsamiq Sans, cursive">
        <div class="container">
            <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
              
                
            <h4 style="color: #070F64"> Hey '.$startup_name.'!</h4><br>
                <div class="col-sm-4 col-md-4">
                
                </div>
                 <div class="col-sm-8 col-md-8">
                <ul>
                <li>Product Name : '.$product_name.' </li>
                <li>Discription : '.$product_description.'</li>
               
                </ul>
                </div>
                <div class="clearfix"></div>
            <p> Your product details have been Updated successfully.
              </p>

            <p>If everything is fine with all the relevant details, your start-up would be live on our portal within the next 48 hours.</p><br>
Thanks and Regards,<br>
Admin <br>
 (+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
       <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
            <center>
            <div class=" container col-xs-12">
                <i>“Innovation is often misunderstood with only being a <b>Discovery</b> or an <b>Invention</b>. Innovation can be as simple as different packaging and as complex as rocket science” </i>
            </div>
            </center>
        </div>
             </div>
    </body>
</html>
';
    $subject='Product-Updated';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('product updated successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first'); 
	 }
    }
   }
  public function deleteproduct(Request $request)
    {
     if(Session::has('cityadmin'))
     {   
        $startup_name=Session::get('startup_name');
		$email=Session::get('startup_email');
        $product_id=$request->id;
        $getfile=DB::table('product')
                ->where('product_id',$product_id)
                ->first();

        

    	$delete=DB::table('product')->where('product_id',$product_id)->delete();
        $delete=DB::table('product_img')->where('product_id',$product_id)->delete();
		$delete=DB::table('technical_details')->where('product_id',$product_id)->delete();
      if($delete)
        { 
        $msg='<!DOCTYPE html>
<html>
    <head>
        <title>Product-Update</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Dosis:wght@200&family=Noto+Sans+JP&family=Odibee+Sans&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">

    <style> 
            .container{
                padding-left:10%;
                padding-top:3%;
                padding-bottom:3%;
            }
        </style>
    </head>
     <body style="font-family:Balsamiq Sans, cursive">
        <div class="container">
            <div class="col-xs-6" style="border: 5px solid #070F64; padding: 50px;" >
               
                
            <h4 style="color: #070F64"> Hey '.$startup_name.'!</h4><br>
                <div class="col-sm-4 col-md-4">
                </div>
                 <div class="col-sm-8 col-md-8">
                <ul>
                <li>Product Name : </li>
                </ul>
                </div>
                <div class="clearfix"></div>
            <p> Your product have been Deleted successfully.
              </p>

Admin <br>
 (+91 9725148432)<br>
    (Ahmedabad)<br><br>
           
       <img src="'.url("public/email_images/Logo.png").'" class="img-responsive" width="100">
            <center>
            <div class=" container col-xs-12">
                <i>“Innovation is often misunderstood with only being a <b>Discovery</b> or an <b>Invention</b>. Innovation can be as simple as different packaging and as complex as rocket science” </i>
            </div>
            </center>
        </div>
             </div>
    </body>
</html>
';
    $subject='Product-Deleted';

	 $headers = "From:Start-Up mall <info@start-upmall.com>" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// send email 
//$receiver_email='kiranshekokar248@gmail.com'; 
if(mail($email,$subject,$msg,$headers))
return redirect()->back()->withErrors('product deleted successfully');
else
	return redirect()->back()->withErrors('try again');
	  }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }

   }
	}
	
    public function ViewProduct(Request $request)
    {
     if(Session::has('cityadmin'))
     {
         $product_id = $request->id;
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $product= DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('start_upcategories','subcat.category_id', '=', 'start_upcategories.category_id')
                 ->where('product_id', $product_id)
                ->get();
	    $tech=DB::table('technical_details')
		->where('product_id',$product_id)
                ->get(); 
        $image =  DB::table('product_img')
                ->where('product_id', $product_id)
                ->get();    
				
        return view('cityadmin.product.viewproduct',compact("cityadmin_email","product","cityadmin","image","tech"));
      
     }
     {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
	 public function deletetechspech(Request $request)
    {
    $product_id = $request->id;
	
 error_log('Some message here.');

		$tech=DB::table('technical_details')
		->where('id',$product_id)
		->delete();
		  if($tech){
            return redirect()->back()->withErrors(' Deleted Successfully');
        }
        else{
            return redirect()->back()->withErrors("something went wrong.");
        }
		
    }
	
}