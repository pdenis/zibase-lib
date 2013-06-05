<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class PingCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class PingCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}    
     */
    protected $acceptedParameters = array(
        'command'
    );

    /**
     * Constructor
     * 
     * @param array $parameters Command parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 8;

        parent::__construct($parameters);
    }
    
    /**
     * {@inheritdoc}    
     */
    public function validate()
    {
        $this->validateAcceptedParameters();
    }

    /**
     * {@inheritdoc}    
     */
    public function create()
    {
        return $this->parameters;
    }
}