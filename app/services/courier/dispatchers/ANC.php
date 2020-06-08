<?php
namespace Services\Courier\Dispatchers;
use Services\Courier\Contracts\DispatchConsigmentsInterface;

class ANC implements DispatchConsigmentsInterface
{
	public function dispatch($ids)
	{
		// generate CSV and ftp to ANC

		return [
	        'status' => 200,
			'msg' => 'Consignement Ids uploaded to ANC'
		];   
	}

	public function __toString()
	{
		return static::class;
	}
}