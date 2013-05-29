    <?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class AlertCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class AlertCommand extends AbstractCommand
{
    // Actions
    const ACTION_OFF = 0;
    const ACTION_ON = 1;
    // Simulate detector ID
    const ACTION_SIMULATE = 2;

    // Event types
    const EVT_AXX_PXX_ON = 4;
    const EVT_AXX_PXX_OFF = 9;
    const EVT_AXX_PXX_ZW_ON = 19;
    const EVT_AXX_PXX_ZW_OFF = 20;

    /**
     * {@inheritdoc}    
     */
    protected $acceptedParameters = array(
        'action',
        'event',
        'id'
    );

    /**
     * Constructor
     * 
     * @param array $parameters Command parameters
     */
    public function __construct(array $parameters = array())
    {
        $this->parameters['command'] = 11;
        $this->parameters['param1'] = 4;

        parent::__construct($parameters);
    }
    
    /**
     * {@inheritdoc}    
     */
    public function validate()
    {
        $this->validateAcceptedParameters();
        /*
        ID : 0-255 : X10 adr ou Zwave adr 
- Others values : 
 ID: 0-(2**32-1) : detector ID 
         */    
    }

    /**
     * {@inheritdoc}    
     */
    public function create()
    {
        return array(
            'command' => $this->parameters['command'],
            'param1'  => $this->parameters['param1'],
            'param2'  => $this->parameters['action'],
            'param3'  => $this->parameters['id'],
            'param4'  => $this->parameters['event'] 
        );
    }
}