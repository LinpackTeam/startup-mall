<?php

namespace App\Http\Controllers\Cityadmin;

use Illuminate\Http\Request;
use App\YourExport;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;


class ImportExcelController extends Controller
{
    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

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
         'created_at'  => Carbon::Now ,
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
