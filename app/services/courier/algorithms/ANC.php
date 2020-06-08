<?php

namespace Services\Courier\Algorithms;
use Services\Contracts\AbstractConsignmentIdAlgo;

class ANC extends AbstractConsignmentIdAlgo
{
	public function parcelAlgo()
	{
		return 'ANCId' . time();
	}
}