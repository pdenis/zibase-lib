<?php

namespace Snide\Zibase;

/**
 * Class Client
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Client
{
	protected $header = 'ZSIG'; // fixed header 'ZSIG'
	protected $command;
	protected $reserved1;
	protected $reserved2;
	protected $zibaseId;
	protected $param1; // generic parameters for commands
	protected $param2; // generic parameters for commands
	protected $param3; // generic parameters for commands
	protected $param4; // generic parameters for commands
	protected $myCount; // incr.counter at each sent packet (not incr. in burst of same packets)
	protected $yourCount; // last counter value received by the other side
	protected $message;

	public function getCommand()
	{
		return $this->command;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function getReserved1()
	{
		return $this->reserved1;
	}

	public function getReserved2()
	{
		return $this->reserved2;
	}

	public function getZibaseId()
	{
		return $this->zibaseId;
	}

	public function getParam1()
	{
		return $this->param1;
	}

	public function getParam2()
	{
		return $this->param2;
	}

	public function getParam3()
	{
		return $this->param3;
	}

	public function getParam4()
	{
		return $this->param4;
	}

	public function getMyCount()
	{
		return $this->myCount;
	}

	public function getYourCount()
	{
		return $this->yourCount;
	}

	public function setMessage($message)
	{
		$this->message = $message;
	}

	public function setReserved1($reserved1)
	{
		$this->reserved1 = $reserved1;
	}

	public function setReserved2($reserved2)
	{
		$this->reserved2 = $reserved2;
	}

	public function setCommand($command)
	{
		$this->command = $command;
	}

	public function setParam1($param1)
	{
		$this->param1 = $param1;
	}

	public function setParam2($param2)
	{
		$this->param2 = $param2;
	}

	public function setParam3($param3)
	{
		$this->param3 = $param3;
	}

	public function setParam4($param4)
	{
		$this->param4 = $param4;
	}

	public function setMyCount($myCount)
	{
		$this->myCount = $myCount;
	}

	public function setYourCount($yourCount)
	{
		$this->yourCount = $yourCount;
	}

	public function setZibaseId($zibaseId)
	{
		$this->zibaseId = $zibaseId;
	}
}