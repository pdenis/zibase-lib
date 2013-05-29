<?php

namespace Snide\Zibase\Factory;

/**
 * Classe CommandFactoryInterface
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
interface CommandFactoryInterface 
{
    /**
     * Create command from command name
     * 
     * @param string $commandName Command name
     * @param array $parameters Command parameters
     * 
     * @return \Snide\Zibase\Factory\Command|null
     */
    public function createCommand($commandName, array $parameters = array());
}

