<?php

namespace Snide\Zibase\Command;

/**
 * Class ReadWriteCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ReadCommand extends WriteCommand
{
    // Actions
    const ACTION_READ_VAR = 0;
    const ACTION_READ_CAL = 2;
    const ACTION_READ_PSEUDO = 4;
    
    protected $acceptedParameters = array(
        'action', // action to execute
        'number' // variable number to read
    );

    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 11;
        $this->parameters['param1'] = 5;

        parent::__construct($parameters);
    }

    public function validate()
    {
        $this->validateAcceptedParameters();
    }

    public function create()
    {
        return array(
            'command' => $this->parameters['command'],
            'param1'  => $this->parameters['param1'],
            'param3'  => $this->parameters['action'],
            'param4'  => $this->parameters['number'] 
        );
    }
}