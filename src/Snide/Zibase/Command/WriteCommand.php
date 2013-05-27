<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class ReadWriteCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class WriteCommand extends AbstractCommand
{
    // Actions
    const ACTION_WRITE_VAR = 1;
    const ACTION_WRITE_CAL = 3;

    protected $acceptedParameters = array(
        'action', // action to execute
        'value', // value to write
        'number' // variable number
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
            'param2'  => $this->parameters['value'], // @todo
            'param3'  => $this->parameters['action'],
            'param4'  => $this->parameters['number'] 
        );
    }
}