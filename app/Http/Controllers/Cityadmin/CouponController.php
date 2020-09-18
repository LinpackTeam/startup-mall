<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;

class CouponController extends Controller
{
    public function allcoupons(Request $request)
    {
    if(Session::has('cityadmin'))
     {
        $cityadmin_email=Session::get('cityadmin');
        $cityadmin=DB::table('cityadmin')
        ->where('cityadmin_email',$cityadmin_email)
        ->first();
        $coupon = DB::table('coupon')
                ->where('cityadmin_id', $cityadmin->cityadmin_id)
                ->get();           
        return view('cityadmin.coupon.allcoupons',compact("cityadmin_email","coupon","cityadmin"));
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
                ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->where('cityadmin_id', $cityadmin->cityadmin_id)
                ->get();
                
            
         return view('cityadmin.product.addproduct',compact("cityadmin_email","subcat","cityadmin"));
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
        $product_id=$request->id;
        $subcat_name=$request->subcat_name;
        $product_name=$request->product_name;
        $mrp = $request->mrp;
        $price=$request->price;
        $member_price=$request->member_price;
        $subscription_price=$request->subscription_price;
        $unit=$request->unit;
        $stock=$request->stock;
        $qty=$request->qty;
        $old_product_image=$request->old_product_image;
        $product_description =$request->product_description;
        $date = date('d-m-Y');
        $created_at=date('d-m-Y h:i a');
        $product_image = $request->product_image;
        $fileName = date('dmyhisa').'-'.$product_image->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $product_image->move('product/images/'.$date.'/', $fileName);
        $product_image = 'product/images/'.$date.'/'.$fileName;
        
        
          
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

        $insert = DB::table('product')
                  ->insert(['subcat_id'=>$subcat_name,'product_name'=>$product_name,'mrp'=>$mrp, 'price'=>$price,'subscription_price'=>$subscription_price,'membership_price'=>$member_price,'unit'=>$unit,'stock'=>$stock,'qty'=> $qty,'product_image'=>$product_image,'description'=>$product_description,'created_at'=>$created_at]);
     
     return redirect()->back()->withErrors('successfully added');
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
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
    	 $subcat=DB::table('subcat')
    	        ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                 ->where('cityadmin_id', $cityadmin->cityadmin_id)
                ->get();
    	 return view('cityadmin.product.Editproduct',compact("cityadmin_email","cityadmin","product","product_id","subcat"));
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
        $product_id=$request->id;
        $subcat_name=$request->subcat_name;
        $product_name=$request->product_name;
        $mrp = $request->mrp;
        $price=$request->price;
        $member_price=$request->member_price;
        $subscription_price=$request->subscription_price;
        $unit=$request->unit;
        $stock=$request->stock;
        $qty=$request->qty;
        $old_product_image=$request->old_product_image;
        $product_description =$request->product_description;
        $date = date('d-m-Y');
        $updated_at = date("d-m-y h:i a");
        $date=date('d-m-y');
        
        $this->validate(
            $request,
                [
                    'subcat_name'=>'required',
                    'price'=>'required',
                    'product_image' => 'mimes:jpeg,png,jpg|max:400',
                    'old_product_image'=>'required',
                ],
                [
        
                    'subcat_name.required'=>'select subcat name',
                    'price.required'=>'Enter the price',
                    'old_product_image.required' => 'choose picture.',
                ]
        );

        $getImage = DB::table('product')
                     ->where('product_id',$product_id)
                    ->first();

        $image = $getImage->product_image;  

        if($request->hasFile('product_image')){
             if(file_exists($image)){
                unlink($image);
            }
            $product_image = $request->product_image;
            $fileName = date('dmyhisa').'-'.$product_image->getClientOriginalName();
            $fileName = str_replace(" ", "-", $fileName);
            $product_image->move('product/images/'.$date.'/', $fileName);
            $product_image = 'product/images/'.$date.'/'.$fileName;
        }
        else{
            $product_image = $old_product_image;
        }

        $update = DB::table('product')
                 ->where('product_id', $product_id)
                 ->update(['subcat_id'=>$subcat_name,'product_name'=>$product_name,'price'=>$price,'mrp'=>$mrp,'subscription_price'=>$subscription_price,'membership_price'=>$member_price, 'unit'=> $unit,'stock'=>$stock,'qty'=> $qty,'product_image'=>$product_image,'description'=>$product_description,'updated_at'=>$updated_at]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
  public function deleteproduct(Request $request)
    {
     if(Session::has('cityadmin'))
     {
        $product_id=$request->id;

        $getfile=DB::table('product')
                ->where('product_id',$product_id)
                ->first();

        $product_image=$getfile->product_image;

    	$delete=DB::table('product')->where('product_id',$request->id)->delete();
        if($delete)
        {
        
            if(file_exists($product_image)){
                unlink($product_image);
            }
         
        return redirect()->back()->withErrors('delete successfully');

        }
        else
        {
           return redirect()->back()->withErrors('unsuccessfull delete'); 
        }
	 }
	else
	 {
	    return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }

    }
	
    
}
