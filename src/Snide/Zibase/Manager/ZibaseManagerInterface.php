<?php

namespace Snide\Zibase\Manager;

use Snide\Zibase;

/**
 * interface ZibaseManagerInterface 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface ZibaseManagerInterface
{
	protected $requestManager;
	protected $responseManager;
	protected $zibase;

	public function __construct(Zibase $zibase, RequestManagerInterface $requestManager, ResponseManagerInterface $responseManager)
	{
		$this->zibase = $zibase;
		$this->requestManager = $requestManager;
		$this->responseManager = $responseManager;
	}	
}