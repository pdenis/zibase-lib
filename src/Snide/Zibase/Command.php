<?php

namespace Snide\Zibase;

/**
 * Class Command 
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
abstract class Command
{
	protected $parameters;
	protected $acceptedParameters;
	
	public function __construct(array $parameters = array())
	{
		$this->addParameters($parameters);
	}

	public function addParameters(array $parameters = array())
	{
		$this->setParameters(
			array_merge($this->getParameters(), $parameters)
		);
	}
	public function addParameter($key, $value)
	{
		$this->parameters[$key] = $value;
	}

	public function getParameters()
	{
		if(empty($this->parameters)) {
			$this->parameters = array();
		}
		return $this->parameters;
	}

	public function setParameters(array $parameters = array())
	{
		$this->parameters = $parameters;
	}

	abstract public function validate();
	abstract public function create();

	protected function validateAcceptedParameters()
	{
		if(!in_array(array_keys($this->getParameters()), $this->acceptedParameters)) {
			throw new \Exception(
				sprintf('Some parameters are not valid %s', print_r($this->parameters, true))
			);
		}

		return true;
	}
}