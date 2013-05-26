<?php

namespace Snide\Zibase\Client;

use Snide\Zibase\Client as BaseClient;

/**
 * Class Request
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class Request extends BaseClient
{
	public function __construct(array $parameters = array())
	{
		$this->load($parameters);
	}

	public function send($ip, $port)
	{
		$buffer = $this->toBinary();
		$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		$ack = "";
		$response = null;
		socket_sendto($socket, $buffer, strlen($buffer), 0, $ip, $port);
		socket_recvfrom($socket, $ack, 512, 0, $ip, $port);
		if (strlen($ack) > 0) {
			$response = $ack;
		}	
		socket_close($socket);
		
		return $response;
	}

	protected function load(array $parameters = array())
	{
		if(is_array($parameters)) {
			foreach($parameters as $key => $value) {
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)) {
					$this->$method($value);
				}
			}
		}
	}

	protected function toBinary()
	{
		$bin = $this->header;

		$bin .= pack("n", $this->command);
        
        $bin .= str_pad($this->reserved1, 16, chr(0));
        $bin .= str_pad($this->zibaseId, 16, chr(0));
        $bin .= str_pad($this->reserved2, 12, chr(0));

        $bin .= pack("N", $this->param1);
        $bin .= pack("N", $this->param2);
        $bin .= pack("N", $this->param3);
        $bin .= pack("N", $this->param4);
        $bin .= pack("n", $this->myCount);
        $bin .= pack("n", $this->yourCount);
        
        if ($this->message != null) {
			$bin .= str_pad($this->message, 96, chr(0));        
        }
                
        return $bin;	
	}


}