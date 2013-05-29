<?php

namespace Snide\Zibase\Factory;

/**
 * Classe CommandFactory
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class CommandFactory implements CommandFactoryInterface
{
    /**
     * Commands namespaces
     * 
     * @var array 
     */
    protected $namespaces = array();
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->namespaces[] = 'Snide\Zibase\Command'; // Default namespace
    }
    
    /**
     * Add a namespace
     * 
     * @param string $namespace
     */
    public function addNamespace($namespace) 
    {
        if(!is_array($this->namespaces)) {
            $this->namespaces = array();
        }
        $this->namespaces[] = $namespace;
    }
    
    /**
     * Create command from command name
     * 
     * @param string $commandName Command name
     * @param array $parameters Command parameters
     * 
     * @return \Snide\Zibase\Factory\Command|null
     */
    public function createCommand($commandName, array $parameters = array())
    {
        $commandClass = ucFirst($commandName).'Command';
        foreach($this->getNamespaces() as $ns) {
            if(class_exists($class = $ns.'\\'.$commandClass)) {
                $command = new $class($parameters);
                if($command instanceof Snide\Zibase\Command) {
                    return $command;
                }
            }
        }
        
        return null;
    }
    
    /**
     * Getter namespaces
     * 
     * @return array Command namespaces
     */
    public function getNamespaces()
    {
        if(!is_array($this->namespaces)) {
            $this->namespaces = array();
        }
        
        return $this->namespaces;
    }
    
    /**
     * Setter namespaces
     * 
     * @param array $namespaces Command namespaces
     */
    public function setNamespaces(array $namespaces = array())
    {
        $this->namespaces = $namespaces;
    }
}

