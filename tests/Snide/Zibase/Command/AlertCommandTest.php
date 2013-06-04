<?php

namespace Snide\Zibase\Command;

use Snide\Zibase\Comamnd\AlertCommand;

class AlertCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Request
     */
    protected $object;

    protected $params = array(
        'event'  => 'specific_event',
        'id'     => 'specific_id',
        'action' => \Snide\Zibase\Command\AlertCommand::ACTION_ON
    );

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new \Snide\Zibase\Command\AlertCommand($this->params);

    }
   
    /**
     * @covers Snide\Zibase\Comamnd\AlertCommand::__construct
     */
    public function test__construct()
    {
        $this->assertEquals(11, $this->object->getParameter('command'));
        $this->assertEquals(4, $this->object->getParameter('param1'));
        $this->assertEquals($this->params['event'], $this->object->getParameter('event'));
        $this->assertEquals($this->params['id'], $this->object->getParameter('id'));
        $this->assertEquals($this->params['action'], $this->object->getParameter('action'));
    }

    /**
     * @covers Snide\Zibase\Comamnd\AlertCommand::testcreate
     */
    public function testcreate()
    {
        $result = $this->object->create();
        $this->assertEquals(11, $result['command']);
        $this->assertEquals(4, $result['param1']);
        $this->assertEquals($this->params['event'], $result['param4']);
        $this->assertEquals($this->params['id'], $result['param3']);
        $this->assertEquals($this->params['action'], $result['param2']);

    }

    /**
     * @covers Snide\Zibase\Comamnd\AlertCommand::testvalidate
     */
    public function testvalidate()
    {
       
        
    }
}
