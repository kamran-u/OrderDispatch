<?php
namespace Services\Courier\Algorithms;
use Services\Courier\Contracts\AbstractConsignmentIdAlgo;

class RoyalMail extends AbstractConsignmentIdAlgo
{
	public function generateAlgo()
	{
		return 'RoyalMailId' . time();
	}
}