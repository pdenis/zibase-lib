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
    protected $acceptedParameters = array(
        'message'
    );

    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 16;

        parent::__construct($parameters);
    }

    public function validate()
    {
        $this->validateAcceptedParameters();
        if(!isset($this->parameters['message']) || empty($this->parameters['message'])) {
            throw new \Exception('message parameter is required');
        }
    }

    public function create()
    {
        return $this->parameters;
    }
}