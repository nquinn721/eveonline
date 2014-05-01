<?php

require_once '../ale/factory.php';

require_once '../ale/util/context.php';

class ContextTest extends PHPUnit_Framework_TestCase
{
	public function testContextCallArguments()
	{
		$expected = 'result';
		$mock = $this->getMock("Mock", array('_retrieveXml'));//, $arguments)
		$mock->expects($this->once())
			->method('_retrieveXml')
			->with($this->equalTo(array('foo', 'bar', 'baz')), $this->equalTo(array('args')))
			->will($this->returnValue($expected));
		
		$context = new AleUtilContext($mock, "foo");
		$actual = $context->bar->baz('args');
		$this->assertEquals($expected, $actual);
	}
}