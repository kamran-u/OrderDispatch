<?php

namespace Services\Courier\Contracts;

abstract class AbstractConsignmentIdAlgo
{
	abstract public function generateAlgo();
	public function getConsignmentId()
	{
		return $this->generateAlgo();
	}
}