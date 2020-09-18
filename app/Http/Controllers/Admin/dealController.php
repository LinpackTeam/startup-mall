<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class dealController extends Controller
{
    public function deal(Request $request)
    {
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $product= DB::table('first_wallet_recharge')
                 ->join('product','first_wallet_recharge.product_id', '=', 'product.product_id')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->join('cityadmin','tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
                ->get();
                 
        return view('admin.deal.deal',compact("admin_email","product","admin"));
    }
    
     public function Adddeal(Request $request)
    {
        $admin_email=Session::get('admin');
        $admin=DB::table('admin')
        ->where('admin_email',$admin_email)
        ->first();
        $product = DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->join('cityadmin','tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
                ->get();
                
            
         return view('admin.deal.adddeal',compact("admin_email","product","admin"));
    }
    
    
        public function AddNewdeal(Request $request)
    {
        
        
        
        $product_name=$request->product_name;
        $product1 = DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->join('cityadmin','tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
                ->first();
        $city_id=$product1->city_id;        
        $min_wallet_recharge = $request->min_wallet_recharge;
        $free_for=$request->free_for;
       
        
          
        $this->validate(
            $request,
                [
                    'product_name'=>'required',
                    'free_for'=>'required',
                ],
                [
                    'product_name.required'=> 'enter product name',
                    'free_for.required'=>'Enter days',
                ]
        );

        $insert = DB::table('first_wallet_recharge')
                  ->insert(['city_id'=>$city_id, 'product_id'=>$product_name,'min_wallet_recharge'=>$min_wallet_recharge, 'free_for'=>$free_for]);
     
     return redirect()->back()->withErrors('successfully added');

    }
    
    public function Editdeal(Request $request)
    {
    	
       $deal_id=$request->id;
    	 $admin_email=Session::get('admin');
    	 
         $admin=DB::table('admin')
                ->where('admin_email',$admin_email)
                ->first();       
    	 $first_wallet_recharge= DB::table('first_wallet_recharge')
    	 		  ->where('deal_id',$deal_id)
    	 		  ->first();
    	 $product = DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->join('cityadmin','tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
                ->get();
    	 return view('admin.deal.Editdeal',compact("admin_email","admin","product","deal_id","first_wallet_recharge"));


    }
    public function Updatedeal(Request $request)
{
    
        $deal_id=$request->id;
        $product1 = DB::table('product')
                 ->join('subcat','product.subcat_id', '=', 'subcat.subcat_id')
                 ->join('tbl_category','subcat.category_id', '=', 'tbl_category.category_id')
                ->join('cityadmin','tbl_category.cityadmin_id', '=', 'cityadmin.cityadmin_id')
                ->join('city', 'cityadmin.city_id', '=', 'city.city_id')
                ->first();
        $city_id=$product1->city_id;   
        $product_name=$request->product_name;
        $min_wallet_recharge = $request->min_wallet_recharge;
        $free_for=$request->free_for;
        
         $this->validate(
            $request,
                [
                    'product_name'=>'required',
                    'free_for'=>'required',
                ],
                [
                    'product_name.required'=> 'enter product name',
                    'free_for.required'=>'Enter days',
                ]
        );

      

        $update = DB::table('first_wallet_recharge')
                 ->where('deal_id', $deal_id)
                 ->update(['city_id'=>$city_id, 'product_id'=>$product_name,'min_wallet_recharge'=>$min_wallet_recharge, 'free_for'=>$free_for]);

        if($update){

             

            return redirect()->back()->withErrors(' updated successfully');
        }
        else{
            return redirect()->back()->withErrors("something wents wrong.");
        }
    }
  public function deletedeal(Request $request)
    {
        $deal_id=$request->id;

    	$delete=DB::table('first_wallet_recharge')->where('deal_id',$request->id)->delete();
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