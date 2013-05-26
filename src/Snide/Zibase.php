<?php

namespace Snide\Zibase;

use Snide\Zibase\Client\Request;
use Snide\Zibase\Command;
use Snide\Zibase\Client\Response;

/**
 * Class Zibase
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Zibase
{
	protected $host;
	protected $port;
	protected $request;
	protected $response;

	public function __construct($host, $port = 49999)
	{
		$this->host = $host;
		$this->port = $port;
	}

	public function send(Request $request)
	{

	}

	public function execute(Command $command)
	{
		$command->validate();
		$this->request = new Request($command->create());

		$this->response = new Response($request->send($this->ip, $this->port));

		return $this->response;
	}

	public function getHost()
	{
		return $this->host;
	}

	public function setHost($host)
	{
		$this->host = $host;
	}

	public function getPort()
	{
		return $this->port;
	}

	public function setPort($port)
	{
		$this->port = $port;
	}
}