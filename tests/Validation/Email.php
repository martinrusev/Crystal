<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Email.php');

class TestOfEmailValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Email('test');
		$this->assertFalse($alpha->result, 'Email validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Email(array('test'));
		$this->assertFalse($alpha->result, 'Email validation with array should be false');

	}


        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Email('test@mail.com');
		$this->assertTrue($alpha->result, 'Email validation with valid email should be true');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Email();
		$this->assertFalse($alpha->result, 'Email validation with no params should be false');

	}

}
