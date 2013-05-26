<?php

namespace Snide\Zibase\Worker;

/**
 * interface ZibaseWorkerInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
interface ZibaseWorkerInterface
{
	public function executeScript($script);
	public function executeScenario($scenario);
}