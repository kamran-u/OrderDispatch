<?php
namespace Services\Courier\Dispatchers;
use Services\Courier\Contracts\DispatchConsigmentsInterface;

class RoyalMail implements DispatchConsigmentsInterface
{
	public function dispatch($ids)
	{
		// dispatch email to royal mail with all ids  

		return [
		        'status' => 200,
    			'msg' => 'Email sent with Consignement Ids'
			];
	}

	public function __toString()
	{
		return static::class;
	}
}