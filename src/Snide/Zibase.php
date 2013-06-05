<?php

namespace Snide;

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
    /**
     * Zibase Host 
     * 
     * @var string
     */
    protected $host;
    
    /**
     * Zibase port (Default 49999)
     * 
     * @var string
     */
    protected $port;
    
    /**
     * Zibase request 
     * 
     * @var \Snide\Zibase\Client\Request 
     */
    protected $request;
    
    /**
     * Zibase response 
     * 
     * @var \Snide\Zibase\Client\Response
     */
    protected $response;

    /**
     * Timeout des socket
     * 
     * @var int
     */
    protected $timeout;

    /**
     * Constructor
     * 
     * @param string $host Zibase host
     * @param string $port Zibase port
     */
    public function __construct($host, $port = 49999, $timeout = 10)
    {
        $this->host = $host;
        $this->port = $port;
        $this->timeout = $timeout;
    }
    
    /**
     * Send a command to zibase
     * 
     * Ensure that command is valid before send it to zibase
     * 
     * @param \Snide\Zibase\Command $command
     * 
     * @return \Snide\Zibase\Client\Response Response from Zibase
     */
    public function execute(Command $command)
    {
        $command->validate();
        $this->request = new Request($command->create());
        $this->response = new Response(
            $this->request->send(
                $this->host, 
                $this->port,
                $this->timeout
            )
        );

        return $this->response;
    }

    /**
     * Getter host
     * 
     * @return string Zibase Host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Setter host
     * 
     * @param string $host Zibase Host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * Getter port
     * 
     * @return string Zibase port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Setter port
     * 
     * @param string $port Zibase port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }
    
    /**
     * Getter Request
     * 
     * @return \Snide\Zibase\Client\Request Zibase Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * Getter response
     * 
     * @return \Snide\Zibase\Client\Response Zibase Response
     */
    public function getResponse()
    {
        return $this->response;
    }
    
    /**
     * Setter request
     * 
     * @param \Snide\Zibase\Client\Request $request Zibase Request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * Setter response
     * 
     * @param \Snide\Zibase\Client\Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }
}