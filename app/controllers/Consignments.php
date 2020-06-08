<?php
namespace Controllers;
 
use Models\Consignment;
use Models\Customer;
use Services\Courier\ConsignmentIdService;
use \Carbon\Carbon;

class Consignments
{    
	public function add($batchId, $courierId)
	{
		//generate consignement id
		$consignmentId = (new ConsignmentIdService())->generate($courierId);
		
		//persist consignment
		Consignment::create([

			'consignment_id' => $consignmentId, 
			'batch_id' 		 => $batchId,
			'created_by' 	 => loggedInUserId(),
			'courier_id' 	 => $courierId

		]);
	}
}