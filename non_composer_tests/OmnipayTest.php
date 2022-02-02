<?php

namespace Omnipay\Api\Test;

include 'Omnipay.php';

use Omnipay\Api\Api;

class OmnipayTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
        $this->api = new Api($_SERVER['KEY_ID'], $_SERVER['KEY_SECRET']);
    }

    public function testApiAccess()
    {
		$this->assertInstanceOf('Omnipay\Api\Api', $this->api);
	}

    public function testRequests()
	{
		$this->assertTrue(class_exists('\Requests'));
	}
}
