<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class VirtualProbeCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class VirtualProbeCommand extends AbstractCommand
{
    // Types
    const TYPE_OREGON = 17;
    const TYPE_OWL = 20;

    /**
     * {@inheritdoc}    
     */
    protected $acceptedParameters = array(
        'type',       // sensor type
        'id',         // sensor ID
        'value_1',    // First analog value
        'value_2',    // second analog value
        'low_battery', // Battery level
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
        $this->parameters['param1'] = 6;
        $this->parameters['low_battery'] = 0;

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
        $param3  = $this->parameters['value_1'];
        $param3 |= ($this->parameters['value_2'] & 0xFF) << 0x10;
        $param3 |= ($this->parameters['low_battery'] & 0xFF) << 0x1A;

        return array(
            'command' => $this->parameters['command'],
            'param1'  => $this->parameters['param1'],
            'param2'  => $this->parameters['id'],
            'param3'  => $param3, 
            'param4'  => $this->parameters['type'] 
        );
    }
}