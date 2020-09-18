<?php

namespace App\Http\Controllers\Resource_team;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomeresourceController extends Controller
{
    
    public function resourceIndex(Request $request)
    {
    	 $admin_email=Session::get('resource_team');
    	 
    	  $admin=DB::table('resource_team')
    			->where('login_id',$admin_email)
    			->first();	
                    
        return view('resource_team.index', compact("admin_email","admin"));
          
      }


  }