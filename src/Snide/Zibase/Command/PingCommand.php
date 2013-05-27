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
    
    protected $acceptedParameters = array(
        'command'
    );

    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 8;

        parent::__construct($parameters);
    }
    
    public function validate()
    {
        $this->validateAcceptedParameters();
    }

    public function create()
    {
        return $this->parameters();
    }
}