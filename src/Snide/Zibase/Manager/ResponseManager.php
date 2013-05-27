<?php

namespace Snide\Zibase\Manager;

/**
 * interface ResponseManagerInterface
 *
 * @author Pascal DENIS <pascal.denis.75@gmail.com>
 */
class ResponseManager implements ResponseManagerInterface
{
    protected $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function createNew()
    {
        $class = $this->class;
        
        return new $class();
    }
}