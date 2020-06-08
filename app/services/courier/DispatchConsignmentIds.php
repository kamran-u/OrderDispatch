<?php
namespace Services\Courier;
use Models\Courier;
use Exception;

class DispatchConsignmentIds
{
	/**
	* Dynamically initialise dispatch by applying Strategy Pattern 
	* @return array()
	*/
	public function handle($consignments)
	{
		$status = [];
		$namespace = '\Services\Courier\Dispatchers\\';
		foreach ($consignments as $key => $arr) {

			if($key == Courier::ROYAL_MAIL)
			{
				$class = $namespace.'RoyalMail';
				$status['RoyalMail'] = (new $class())->dispatch($arr);
			}

			else if($key == Courier::ANC)
			{
				$class = $namespace.'ANC';
				$status['ANC'] = (new $class())->dispatch($arr);
			} 

		}		

		return $status;
	} 
}