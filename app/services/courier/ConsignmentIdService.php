<?php
namespace Services\Courier;
use Models\Courier;
use Exception;

class ConsignmentIdService
{
	/**
	* Dynamically generate consigment id relevant to the courier by applying Strategy Pattern 
	* @return string
	*/
	public function generate($courierId)
	{
		$courier = Courier::where('id', $courierId)->pluck('courier_name')->toArray();
		return $this->consigmentIdAlgo($courier[0])->getConsignmentId();
	}

	/**
	* initiate courier id genrating class name on the fly  
	* @return array()
	*/
	protected function consigmentIdAlgo($courier)
	{		
		try{

			$class = '\Services\Courier\Algorithms\\' . preg_replace("/\s/", '', $courier);
			if(!class_exists($class))
			{
				throw new Exception('Class not found: ' . $class); 
			}
			
			return new $class();
		}
		catch(Exception $e){

			//ideally log the error and return programe unable to operate msg
			die($e->getMessage());
		}
	} 
}