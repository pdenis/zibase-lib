<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Command as AbstractCommand;

/**
 * Class FrameSendingCommand
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class FrameSendingCommand extends AbstractCommand
{
	// Actions
	const ACTION_ALL_LIGHTS_ON = 4;
	const ACTION_ALL_LIGHTS_OFF = 5;
	const ACTION_ALL_OFF = 6;
	const ACTION_ASSOC = 7;
	const ACTION_DIM_BRIGHT = 2;
	const ACTION_OFF = 0;
	const ACTION_ON  = 1;
	const ACTION_UNASSOC = 8; 

	// Protocols
	const PROTOCOL_BROADCAST = 0;
	const PROTOCOL_CHACON = 3;
	const PROTOCOL_DOMIA = 4;
	const PROTOCOL_VISIONIC433 = 1;
	const PROTOCOL_VISIONIC966 = 2;
	const PROTOCOL_RFS10_TS10 = 7;
	const PROTOCOL_RF_X10 = 5;
	const PROTOCOL_XDD433_ALARM = 8;
	const PROTOCOL_XDD868_ALARM = 9;

	// XDD868 inter/shutter manages several rolling-code protocols upon specified housecode. 
	const PROTOCOL_XDD868_INTER_SHUTTER = 10; 
	const PROTOCOL_XDD868_PILOT_WIRE = 11;
	const PROTOCOL_XDD868_BOILER_AC = 12;
	const PROTOCOL_ZWAVE = 6;

	protected $acceptedParameters = array(
		'action',
		'protocol',
		'dim_bright', // between 0 and 100
		'nb_burst',
		'device_number',
		'house_code'
	);

	public function __construct(array $parameters = array())
	{
		$this->parameters['command'] = 11;
		$this->parameters['param1'] = 0;

		parent::__construct($parameters);
	}
	
	public function validate()
	{
		$this->validateAcceptedParameters();
		/* @TODO
		OFF: 0
 ON: 1 
 DIM/BRIGHT: 2 (DIM/BRIGHT, CHACON/ZWAVE ONLY) 
 ALL_LIGHTS_ON: 4 // X10, not implemented 
 ALL_LIGHTS_OFF: 5 // X10, not implemented 
 ALL_OFF: 6 (X10 ONLY) // X10, not implemented 
 ASSOC : 7 // association mode with broadcasted packet over default protocols when protocol=0, or // 
association mode targeted to the specified ‘protocol” when <>0 
 UNASSOC : 8 unassociation mode (Zwave Only) 
		 */
	}

	public function create()
	{
		return array(
			'command' => $this->parameters['command'],
			'param1'  => $this->parameters['param1'],
			'param2'  => '', // @todo
			'param3'  => $this->parameters['device_number'],
			'param4'  => $this->parameters['house_code'] 
		);
	}
}