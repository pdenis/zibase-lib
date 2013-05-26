<?php

namespace Snide\Zibase\Manager;

use Snide\Zibase\Client\Request;

/**
 * Class RequestManager 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class RequestManager implements RequestManagerInterface
{
	protected $class;

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function createNew()
	{
		$class = $this->class;
		
		return new $class();
	}
}