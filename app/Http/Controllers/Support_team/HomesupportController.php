<?php

namespace App\Http\Controllers\Support_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomesupportController extends Controller
{
    
    public function supportIndex(Request $request)
    {
    	 $admin_email=Session::get('support_team');
    	 
    	  $admin=DB::table('support_team')
    			->where('login_id',$admin_email)
    			->first();	
                    
        return view('support_team.index', compact("admin_email","admin"));
          
      }


  }