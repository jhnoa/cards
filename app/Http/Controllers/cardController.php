<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardController extends Controller
{
	public function object2array($array)
	{
		$result = array();
		foreach($array as $key => $value)
		{
			if(is_array($key)) object2array($key);
			else
			{
				$result[$key] = $value;
			}
		}
		return $result;
	}
    //
    public function index($print,$number)
    {
    	$url = 'http://magiccards.info/scans/en/'.$print.'/'.$number.'.jpg';
    	//return var_export($url);
    	return '<img class="card-img-top" src="'. $url.'" alt="Card image cap" style="height: 500px">';
    }

    public function datacard()
    {
    	$Column = array(
			'sets' => array(),
			'table' => array(),
			'cards' => array()
		);
		$string = file_get_contents(asset('json/Sets.json'));

		$json_a = json_decode($string, true);

		$Contents = $this->object2array($json_a);
    	foreach($Contents as $Sets => $Keys)
		{
			if(is_array($Keys))
			{
				if(array_key_exists($Sets, $Column['sets']));
				else $Column['sets'][$Sets]="array";
			}
			else
			{
				if(array_key_exists($Sets, $Column['sets']))$Column['sets'][$Sets]+=1;
				else $Column['sets'][$Sets]=1;
			}
			
			foreach($Keys as $key => $values)
			{
				if(is_array($values))
				{
					if(array_key_exists($key, $Column['table']));
					else $Column['table'][$key]="array";
				}
				else
				{
					if(array_key_exists($key, $Column['table']))$Column['table'][$key]+=1;
					else $Column['table'][$key]=1;
				}
				
				if(strcmp($key,'cards')==0)
				{
					foreach($values as $value => $val)
					{	
						foreach($val as $a => $b)
						{	
							if(is_array($b))
							{
								if(array_key_exists($a, $Column['cards']));
								else $Column['cards'][$a]="array";
							}
							else
							{
								if(array_key_exists($a, $Column['cards']))$Column['cards'][$a]+=1;
								else $Column['cards'][$a]=1;
							}
						}
					}
				}
			}
		}
		return '<pre>'.var_export($Column,true).'</pre>';
    }
    
}
