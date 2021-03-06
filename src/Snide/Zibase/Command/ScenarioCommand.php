<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;


/**
 * Class ScenarioCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ScenarioCommand extends AbstractCommand
{
    /**
     * {@inheritdoc}    
     */
    protected $acceptedParameters = array(
        'number',
        'command',
        'param1'
    );

    /**
     * Constructor
     * 
     * @param array $parameters Command parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 11;
        $this->parameters['param1'] = 1;

        parent::__construct($parameters);
    }

    /**
     * {@inheritdoc}    
     */
    public function validate()
    {
        $this->validateAcceptedParameters();
        if(!isset($this->parameters['number']) || !is_integer($this->parameters['number'])) {
            throw new \Exception('parameters number is required and must be an interger');
        }
    }

    /**
     * {@inheritdoc}    
     */
    public function create()
    {
        return array(
            'command' => $this->parameters['command'],
            'param1'  => $this->parameters['param1'],
            'param2'  => $this->parameters['number']
        );
    }
}