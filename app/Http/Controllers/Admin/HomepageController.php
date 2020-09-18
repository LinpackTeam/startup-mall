<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class HomepageController extends Controller
{
    
    public function main(Request $request)
    {
		return view('admin.Home');
	}
}