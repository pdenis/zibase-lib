<?php

namespace Snide\Zibase\Client;

use Snide\Zibase\Client\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Request
     */
    protected $object;

    protected $params = array(
        'header' => 'ZSIG',
        'param1' => '2',
        'myCount' => null,
        'yourCount' => null,
        'param2' => '1',
        'param3' => '3',
        'param4' => '4',
        'reserved1' => 1,
        'reserved2' => 2,
        'command'   => 1,
        'message'   => '[lm 1]',
        'zibaseId'  => 123,
        'command'  => 1
    );

    protected $bin;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Request();

        $this->bin = $this->params['header'];

        $this->bin .= pack("n", $this->params['command']);
        
        $this->bin .= str_pad(null, 16, chr(0));
        $this->bin .= str_pad($this->params['zibaseId'], 16, chr(0));
        $this->bin .= str_pad(null, 12, chr(0));

        $this->bin .= pack("N", $this->params['param1']);
        $this->bin .= pack("N", $this->params['param2']);
        $this->bin .= pack("N", $this->params['param3']);
        $this->bin .= pack("N", $this->params['param4']);
        $this->bin .= pack("n", $this->params['myCount']);
        $this->bin .= pack("n", $this->params['yourCount']);
        
        $this->bin .= str_pad($this->params['message'], 96, chr(0));        

    }
   
    /**
     * @covers Snide\Zibase\Client\Request::__construct
     * @covers Snide\Zibase\Client\Request::load
     * @covers Snide\Zibase\Client::getParam1
     * @covers Snide\Zibase\Client::getParam2
     * @covers Snide\Zibase\Client::getParam3
     * @covers Snide\Zibase\Client::getParam4
     * @covers Snide\Zibase\Client::getReserved1
     * @covers Snide\Zibase\Client::getReserved2
     * @covers Snide\Zibase\Client::getCommand
     * @covers Snide\Zibase\Client::getMessage
     * @covers Snide\Zibase\Client::getZibaseId
     * @covers Snide\Zibase\Client::setParam1
     * @covers Snide\Zibase\Client::setParam2
     * @covers Snide\Zibase\Client::setParam3
     * @covers Snide\Zibase\Client::setParam4
     * @covers Snide\Zibase\Client::setCommand
     * @covers Snide\Zibase\Client::setMessage
     * @covers Snide\Zibase\Client::setZibaseId
     */
    public function test__construct()
    {
        $this->assertNull($this->object->getParam1());
        $this->assertNull($this->object->getParam2());
        $this->assertNull($this->object->getParam3());
        $this->assertNull($this->object->getParam4());
        $this->assertNull($this->object->getReserved1());
        $this->assertNull($this->object->getReserved2());
        $this->assertNull($this->object->getCommand());
        $this->assertNull($this->object->getMessage());
        $this->assertNull($this->object->getZibaseId());

        $this->object = new Request($this->params);
        $this->assertEquals($this->params['param1'], $this->object->getParam1());
        $this->assertEquals($this->params['param2'], $this->object->getParam2());
        $this->assertEquals($this->params['param3'], $this->object->getParam3());
        $this->assertEquals($this->params['param4'], $this->object->getParam4());
        $this->assertNull($this->object->getReserved1());
        $this->assertNull($this->object->getReserved2());
        $this->assertEquals($this->params['command'], $this->object->getCommand());
        $this->assertEquals($this->params['message'], $this->object->getMessage());
        $this->assertEquals($this->params['zibaseId'], $this->object->getZibaseId());
    }

    /**
     * @covers Snide\Zibase\Client\Request::toBinary
     */
    public function testtoBinary()
    {
        $this->object = new Request($this->params);

        $binaryMethod = self::getMethod('toBinary');

        $this->assertEquals($binaryMethod->invokeArgs($this->object, array()), $this->bin);
    }

    protected static function getMethod($name) {
        $class = new \ReflectionClass('Snide\Zibase\Client\Request');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }
}
