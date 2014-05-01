<?php

require_once '../ale/factory.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
	public function testConstants()
	{
		$this->assertTrue(defined("ALE_BASE"));
		$this->assertTrue(defined("ALE_CONFIG_DIR"));
		$this->assertTrue(file_exists(ALE_BASE));
		$this->assertTrue(file_exists(ALE_CONFIG_DIR));
	}
	
	public function testGetEVEOnlineDotConfig()
	{
		$config = array(
			'main.host' => 'https://api.eveonline.com/',
			'main.suffix' => '.xml.aspx',
			'main.parserClass' => 'string' ,
			'main.serverError' => 'ignore',
			'main.requestError' => 'throwException',
		 
			'cache.class' => 'file',
			'cache.rootdir' => '/root/dir',
		
			'request.class' => 'fsock'
		);
		
		$expectedConfig = array(
			'host' => 'https://api.eveonline.com/',
			'suffix' => '.xml.aspx',
			'parserClass' => 'string' ,
			'serverError' => 'ignore',
			'requestError' => 'throwException',
		);
		
		$actual = AleFactory::getEVEOnline($config, true);
		$this->assertInstanceOf('AleEVEOnline', $actual);
		$this->assertAttributeInstanceOf('AleCacheFile', 'cache', $actual);
		$this->assertAttributeInstanceOf('AleRequestFsock', 'request', $actual);
		$this->assertAttributeEquals($expectedConfig, 'config', $actual);
	}

	public function testGetEVEOnlineAssociativeArrayConfig()
	{
		$config = array(
			'host' => 'https://api.eveonline.com/',
			'suffix' => '.xml.aspx',
			'parserClass' => 'AleParserXMLElement' ,
			'serverError' => 'ignore',
			'requestError' => 'throwException',
		 
			'cache' => array(
				'class' => 'file',
				'rootdir' => '/root/dir',
			),
		
			'request' => array(
				'class' => 'fsock'
			),
		);
		
		$expectedConfig = array(
			'host' => 'https://api.eveonline.com/',
			'suffix' => '.xml.aspx',
			'parserClass' => 'AleParserXMLElement' ,
			'serverError' => 'ignore',
			'requestError' => 'throwException',
		);
		
		$actual = AleFactory::getEVEOnline($config, true);
		$this->assertInstanceOf('AleEVEOnline', $actual);
		$this->assertAttributeInstanceOf('AleCacheFile', 'cache', $actual);
		$this->assertAttributeInstanceOf('AleRequestFsock', 'request', $actual);
		$this->assertAttributeEquals($expectedConfig, 'config', $actual);
	}
	
	public function testGetEVEOnlineConfigIni()
	{
		$config = array(
			'cache.class' => 'dummy',
		);
		$actual = AleFactory::getEVEOnline($config, true);
		$this->assertInstanceOf('AleEVEOnline', $actual);
		$this->assertAttributeInstanceOf('AleCacheDummy', 'cache', $actual);
		$this->assertAttributeInstanceOf('AleRequestCurl', 'request', $actual);
		
	}

}