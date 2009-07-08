<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Required.php');

class TestOfRequiredValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Required('test');
		$this->assertFalse($alpha->result, 'Required validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Required(array('test'));
		$this->assertFalse($alpha->result, 'Required validation with array should be false');

	}


        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Required('');
		$this->assertTrue($alpha->result, 'Required validation with empty string should be true');

	}




}
