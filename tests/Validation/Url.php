<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Url.php');

class TestOfUrlValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Url('test');
		$this->assertFalse($alpha->result, 'Url validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Url(array('test'));
		$this->assertFalse($alpha->result, 'Url validation with array should be false');

	}


        function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Url();
		$this->assertFalse($alpha->result, 'Url validation with empty string should be false');

	}


        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Url("http://google.com");
		$this->assertTrue($alpha->result, 'Url validation with valid url should be true');

	}




}
