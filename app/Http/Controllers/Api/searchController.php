<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
 
    public function searchingFor(Request $request)
    {
        $keyword = $request->keyword;
        $cityadmin_id = $request->cityadmin_id;

        $searchclass = DB::table('product')
                      ->join('subcat', 'product.subcat_id', '=', 'subcat.subcat_id')
                      ->join('tbl_category', 'subcat.category_id', '=', 'tbl_category.category_id')
                      ->where('cityadmin_id' , $cityadmin_id)
                      ->where('product_name', 'like', $keyword.'%')
                    // ->orWhere('tbl_category.category_name', 'like', $searchingfor.'%')
                    // ->orWhere('menu.menu_name', 'like', $searchingfor.'%')
                      ->get();
        if(count($searchclass)>0)   { 
            $message = array('status'=>'1', 'message'=>'data found', 'data'=>$searchclass);
            return $message;
        }
        else{
            $message = array('status'=>'0', 'message'=>'data not found', 'data'=>[]);
            return $message;
        }

        return $message;
    }
}
