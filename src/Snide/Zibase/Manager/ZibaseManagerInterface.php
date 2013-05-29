<?php

namespace Snide\Zibase\Manager;

/**
 * interface ZibaseManagerInterface 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface ZibaseManagerInterface
{
    public function executeScript($script);
    
    public function getLastResponse();
    
    public function ping();
    
    public function readVariable($variable) ;
    
    public function readCalendar($variable);
    
    public function runScenario($scenario);
    
    public function sendVirtualProbe($type, $sensorId, $firstAnalogValue, $secondAnalogValue, $lowBattery = 0);
            
    public function writeCalendar($value);
    
    public function writeVariable($variable, $value);
}