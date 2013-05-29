<?php

namespace Snide\Zibase;

/**
 * Class Client
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Client
{
    /**
     * Fixed header 'ZSIG'
     * 
     * @var string
     */
    protected $header = 'ZSIG';
    
    /**
     * Command number
     * 
     * @var int
     */
    protected $command;
    
    /**
     * Reserved attribute
     * 
     * @var string
     */
    protected $reserved1;
    
    /**
     * Second reserved attribute
     * 
     * @var string
     */
    protected $reserved2;
    
    /**
     * Zibase ID
     * 
     * @var string
     */
    protected $zibaseId;
    
    /**
     * Generic parameters for commands
     * 
     * @var mixed
     */
    protected $param1;    
    
    /**
     * Generic parameters for commands
     * 
     * @var mixed
     */
    protected $param2;
    
    /**
     * Generic parameters for commands
     * 
     * @var mixed
     */
    protected $param3;   
    
    /**
     * Generic parameters for commands
     * 
     * @var mixed
     */
    protected $param4;
    
    /**
     * Incr.counter at each sent packet (not incr. in burst of same packets)
     * 
     * @var int 
     */
    protected $myCount;   
    
    /**
     * Last counter value received by the other side
     * 
     * @var int 
     */
    protected $yourCount;
    
    /**
     * Specific Message (use for script command)
     * 
     * @var string 
     */
    protected $message;

    /**
     * Getter command
     * 
     * @return int Command number
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * Getter message
     * 
     * @return type
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Getter reserved1
     * 
     * @return mixed Reserved attribute
     */
    public function getReserved1()
    {
        return $this->reserved1;
    }

    /**
     * Getter reserved2
     * 
     * @return mixed Reserved attribute
     */
    public function getReserved2()
    {
        return $this->reserved2;
    }

    /**
     * Getter zibaseId
     * 
     * @return string Zibase ID
     */
    public function getZibaseId()
    {
        return $this->zibaseId;
    }

    /**
     * Getter param1
     * 
     * @return mixed Generic parameters for commands
     */
    public function getParam1()
    {
        return $this->param1;
    }

    /**
     * Getter param2
     * 
     * @return mixed Generic parameters for commands
     */
    public function getParam2()
    {
        return $this->param2;
    }

    /**
     * Getter param3
     * 
     * @return mixed Generic parameters for commands
     */
    public function getParam3()
    {
        return $this->param3;
    }

    /**
     * Getter param4
     * 
     * @return mixed Generic parameters for commands
     */
    public function getParam4()
    {
        return $this->param4;
    }

    /**
     * Setter message
     * 
     * @param type $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Setter command
     * 
     * @param int $command Command number
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * Setter param1
     * 
     * @param mixed $param1 Generic parameters for commands
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;
    }

    /**
     * Setter param2
     * 
     * @param mixed $param2 Generic parameters for commands
     */
    public function setParam2($param2)
    {
        $this->param2 = $param2;
    }

    /**
     * Setter param3
     * 
     * @param mixed $param3 Generic parameters for commands
     */
    public function setParam3($param3)
    {
        $this->param3 = $param3;
    }

    /**
     * Setter param4
     * 
     * @param mixed $param4 Generic parameters for commands
     */
    public function setParam4($param4)
    {
        $this->param4 = $param4;
    }
   
    /**
     * setter zibaseId
     * 
     * @param string $zibaseId Zibase ID
     */
    public function setZibaseId($zibaseId)
    {
        $this->zibaseId = $zibaseId;
    }
}