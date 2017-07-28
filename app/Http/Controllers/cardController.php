<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardController extends Controller
{
    public function index()
    {
    	return view('api.card');
    }

    public function FunctionName()
    {
    	
    }

    public function cardApi($print,$number)
    {
    	return view('api.card',['title' => $print, 'text' => $number]);
    }
}
