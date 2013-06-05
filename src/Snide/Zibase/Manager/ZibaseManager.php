<?php

namespace Snide\Zibase\Manager;

use Snide\Zibase;
use Snide\Zibase\Factory\CommandFactoryInterface;
/**
 * class ZibaseManager
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ZibaseManager implements ZibaseManagerInterface
{
    protected $zibase;
    protected $commandFactory;
    protected $response;
    protected $exception;
    
    public function __construct(Zibase $zibase, CommandFactoryInterface $commandFactory)
    {
        $this->zibase = $zibase;
        $this->commandFactory = $commandFactory;
    }    
    
    public function ping()
    {
        try {
            return ($this->sendCommand('ping') != null);
        }catch(\Exception $e) {
            $this->exception = $e;
        }
        return false;        
    }
    
    public function runScenario($scenario)
    {
        return $this->sendCommand('scenario', array(
            'number' => $scenario
        ));
    }
        
    public function executeScript($script)
    {
        return $this->sendCommand('script', array(
            'message' => $script
        ));
    }
    
    public function writeVariable($variable, $value)
    {
        return $this->sendCommand('write', array(
            'action' => \Snide\Zibase\Command\WriteCommand::ACTION_WRITE_VAR,
            'number' => $variable,
            'value'  => $value
        ));
    }
    
    public function writeCalendar($variable, $value)
    {
        return $this->sendCommand('write', array(
            'action' => \Snide\Zibase\Command\WriteCommand::ACTION_WRITE_CAL,
            'number' => $variable,
            'value'  => $value
        ));
    }
    
    public function readVariable($variable) 
    {
        return $this->sendCommand('read', array(
            'action' => \Snide\Zibase\Command\ReadCommand::ACTION_READ_VAR,
            'number' => $variable,
        ))->getParam1();
    }
    
    public function readCalendar($variable)
    {
        return $this->sendCommand('read', array(
            'action' => \Snide\Zibase\Command\ReadCommand::ACTION_READ_CAL,
            'number' => $variable,
        ));
    }
    
    public function sendVirtualProbe($type, $sensorId, $firstAnalogValue, $secondAnalogValue, $lowBattery = 0) 
    {
        return $this->sendCommand('virtualProbe', array(
            'type'         => $type,
            'id'           => $sensorId,
            'first_value'  => $firstAnalogValue,
            'second_value' => $secondAnalogValue,
            'low_battery'  => $lowBattery
        ));
    }
    
    public function getCommandFactory()
    {
        return $this->commandFactory;
    }
    
    public function setCommandFactory(CommandFactoryInterface $commandFactory)
    {
        $this->commandFactory = $commandFactory;
    }
    
    public function getLastResponse()
    {
        return $this->response;
    }
    
    protected function createCommand($commandName, array $parameters = array())
    {
        return $this->commandFactory->createCommand($commandName, $parameters);
    }
    
    protected function sendCommand($commandName, array $parameters = array())
    {
        $command = $this->createCommand($commandName, $parameters);
        if(!$command) {
            throw new \Exception(sprintf('Command %s not found', $commandName));
        }

        $this->response = $this->zibase->execute($command);

        return $this->response;
    }

    public function getException()
    {
        return $this->exception;
    }
}