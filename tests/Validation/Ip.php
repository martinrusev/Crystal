<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Ip.php');

class TestOfIpValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Ip('test');
		$this->assertFalse($alpha->result, 'Ip validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Ip(array('test'));
		$this->assertFalse($alpha->result, 'Ip validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Ip();
		$this->assertFalse($alpha->result, 'Ip validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Ip('1sd92.168.1.2df3');

		$this->assertTrue($alpha->result, 'Ip validation with valid ip should be true');

	}

}
