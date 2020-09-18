<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use App\Product;
use carbon\carbon;
class FileController extends Controller {
    public function importExportExcelORCSV(){
    if(Session::has('cityadmin'))
     {
        return view('file_import_export');
    }
	else
	 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    }
  public function importFileIntoDB(Request $request){
    if(Session::has('cityadmin'))
     {
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            // $data = \Excel::load($path)->get();
           $data = \Excel::load($path)->get();

     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
       foreach($value as $row)
       {
        $insert_data[] = array(
         'subcat_id'=> $row['subcat_id'],      
         'product_name'  => $row['product_name'],
         'mrp'   => $row['mrp'],
         'price'   => $row['price'],
         'subscription_price'    => $row['subscription_price'],
         'qty'  => $row['qty'],
         'product_image'   => $row['product_image'],
         'description'    => $row['description'],
         'stock'  => $row['stock'],
         'unit'   => $row['unit'],
         'created_at'  => Carbon::now() ,
        );
       }
      }

      if(!empty($insert_data))
      {
       DB::table('product')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }
	 }
	else
	 {
			return redirect()->route('cityadminlogin')->withErrors('please login first');
	 }
    } 
    
    
    public function downloadExcelFile($type){
        $products = DB::table('product')->get()->toArray();
        return \Excel::create('expertphp_demo', function($excel) use ($products) {
            $excel->sheet('sheet name', function($sheet) use ($products)
            {
                $sheet->fromArray($products);
            });
        })->download($type);
    }      
}

    
    
    
    
 