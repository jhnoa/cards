<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\CardAdditional;
use App\CreatureCard;
use App\Description;
use App\Set;

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
    	$url = 'http://magiccards.info/scans/en/'.strtolower($print).'/'.$number.'.jpg';
    	//$card['title'] = Card::
    	//return var_export($url);
    	return view('api.card',[
    		'url' => $url,
    		]);
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
    public function insert()
    {
    	$Column = array();
		
		$string = file_get_contents(asset('json/Sets.json'));
		
		$json_a = json_decode($string, true);
		
		$Contents = $this->object2array($json_a);
		
    	foreach($Contents as $Sets => $Keys)
		{

			$newSets = new Set;
			$newSets->name = $Keys['name'];
			$newSets->code = $Keys['code'];
			$newSets->release = $Keys['releaseDate'];
			$newSets->type = $Keys['type'];
			$newSets->save();

			foreach($Keys as $key => $values)
			{
				if($key == "cards")
				{
					foreach($values as $value => $val)
					{	
						$newCards = new Card;
						$newCards->sets = $Keys['code'];
						$newCards->setnumber = (string)$val['number'];
						$newCards->name = $val['name'];
						if(isset($val['cmc']))$newCards->cmc = $val['cmc'];
						if(isset($val['manaCost']))$newCards->manacost = $val['manaCost'];
						$newCards->type = json_encode($val['type']);
						$newCards->rarity = $val['rarity'];
						$newCards->save();

						$newCards = new Description;
						$newCards->sets = $Keys['code'];
						$newCards->setnumber = (string)$val['number'];
						if(isset($val['text']))$newCards->text = json_encode($val['text']);
						if(isset($val['flavor']))$newCards->flavor = $val['flavor'];
						$newCards->save();


						$newCards = new CreatureCard;
						$newCards->sets = $Keys['code'];
						$newCards->setnumber = (string)$val['number'];
						if(isset($val['power']))$newCards->power = $val['power'];
						if(isset($val['toughness']))$newCards->toughness = $val['toughness'];
						if(isset($val['loyalty']))$newCards->loyalty = $val['loyalty'];
						$newCards->save();
						

						$newCards = new CardAdditional;
						$newCards->sets = $Keys['code'];
						$newCards->setnumber = (string)$val['number'];
						if(isset($val['subtypes']))$newCards->subtypes = json_encode($val['subtypes']);
						if(isset($val['supertypes']))$newCards->supertypes = json_encode($val['supertypes']);
						$newCards->layout = $val['layout'];
						$newCards->save();


					}
				}		
			}
		}



		$result = '<pre>'.var_export($Column,true).'</pre>';
		return $result;
    }
    
}
