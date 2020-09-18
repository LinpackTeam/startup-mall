<?php

namespace App\Http\Controllers\Support_team;

use App\Http\Controllers\Controller;
use App\Mail\review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailcontroller extends Controller
{
    /**
     * Ship the given order.
     * @param  Request  $request
  
	
	 
	 
     */
    public function sendmail(Request $request)
    {
       Mail::to('santhosh.bhethi@gmail.com')->send(new review());

	   
    }
}