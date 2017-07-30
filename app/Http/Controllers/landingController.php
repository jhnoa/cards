<?php

namespace MTGDataBase\Http\Controllers;

use Illuminate\Http\Request;
use MTGDataBase\Card;
class landingController extends Controller
{
    //
	public function index($print = '', $number = '')
	{
		$set = array();
		$urls = array();
		$cardnum = 0;
		for ($i=0; $i < 8; $i++) { 
			$cardnum = rand(1,Card::get()->count());
			$set[] = Card::select('sets','setnumber','name')->where('id', $cardnum)->get()->toarray();
			//$urls[] = 'http://magiccards.info/scans/en/'.strtolower($set[0]['sets']).'/'.$set[0]['setnumber'].'.jpg';
			$set[$i][0]['sets'] = strtolower($set[$i][0]['sets']);
		}
		$detail = array(
			'use' => false,
			'print' => $print,
			'number' => $number, 
			);

		if(($print != '') && ($number != ''))$detail['use'] = true;
		return view('index',['urls' => $set, 'detail' => $detail]);
	}
}
