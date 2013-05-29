<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class ScriptCommand.php 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ScriptCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}    
     */
    protected $acceptedParameters = array(
        'message'
    );

    /**
     * Constructor
     * 
     * @param array $parameters Command parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 16;

        parent::__construct($parameters);
    }

    /**
     * {@inheritdoc}    
     */
    public function validate()
    {
        $this->validateAcceptedParameters();
        if(!isset($this->parameters['message']) || empty($this->parameters['message'])) {
            throw new \Exception('message parameter is required');
        }
    }

    /**
     * {@inheritdoc}    
     */
    public function create()
    {
        return $this->parameters;
    }
}