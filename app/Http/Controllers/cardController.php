<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardController extends Controller
{
    //
    public function index($print,$number)
    {
    	return view('check.mtgcard',[
    		'print'=>$print,
    		'number' => $number
    	]);
    }
}
