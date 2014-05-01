<?php

require_once '../ale/factory.php';

require_once '../ale/request/curl.php';

class AleRequestCurlTest extends PHPUnit_Framework_TestCase
{
	public function testQueryApiEveonlineCom()
	{
		return;
		$config = array(
			'certificate' => 'eveonline.crt',
		);
		$curl = new AleRequestCurl($config);
		$xml = $curl->query('https://api.eveonline.com/api/CallList.xml.aspx');
		$this->assertNotSame(false, strpos($xml, '<eveapi'));
	}
}