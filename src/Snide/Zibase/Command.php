<?php

namespace Snide\Zibase;

/**
 * Class Command 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Command
{
    /**
     * Command parameters
     * 
     * @var array 
     */
    protected $parameters;
    
    /**
     * Key parameters accepted for the command
     * 
     * @var array 
     */
    protected $acceptedParameters;
    
    /**
     * Constructor
     * 
     * @param array $parameters Command parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->addParameters($parameters);
    }

    /**
     * Add parameters to command parameters
     * 
     * @param array $parameters Command parameters
     */
    public function addParameters(array $parameters = array())
    {
        $this->setParameters(
            array_merge($this->getParameters(), $parameters)
        );
    }
    
    /**
     * Add parameter to command
     * 
     * @param string $key Key
     * @param string $value Value
     */
    public function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * Getter parameters
     * 
     * @return array Command parameters
     */
    public function getParameters()
    {
        if(empty($this->parameters)) {
            $this->parameters = array();
        }
        return $this->parameters;
    }

    /**
     * Getter parameters
     * 
     * @return array Command parameters
     */
    public function getParameter($key)
    {
        if(isset($this->parameters[$key])) {
            return $this->parameters[$key];
        }
        return false;
    }

    /**
     * Setter parameters
     * 
     * @param array $parameters Command parameters
     */
    public function setParameters(array $parameters = array())
    {
        $this->parameters = $parameters;
    }

    /**
     * Validate command input parameters
     */
    abstract public function validate();
    
    /**
     * Manage input parameters and create final command parameters
     * 
     * @return array
     */
    abstract public function create();

    /**
     * Validate parameters with accepted parameters
     * 
     * @return boolean
     * @throws \Exception
     */
    protected function validateAcceptedParameters()
    {
        if(is_array($this->getParameters())) {
            $keys = array_keys($this->getParameters());
            foreach($keys as $key) {
                if(!in_array($key, $this->acceptedParameters)) {
                    throw new \Snide\Zibase\Command\Exception\ParameterException(
                        sprintf('Some parameters are not valid %s', print_r($this->parameters, true))
                    );
                }
            }
        }
        

        return true;
    }
}