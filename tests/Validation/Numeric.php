<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Numeric.php');

class TestOfNumericValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Numeric('test');
		$this->assertFalse($alpha->result, 'Numeric validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Numeric(array('test'));
		$this->assertFalse($alpha->result, 'Numeric validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Numeric();
		$this->assertFalse($alpha->result, 'Numeric validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Numeric(12);
		$this->assertTrue($alpha->result, 'Numeric validation with Numeric  should be true');

	}

        function TestValidFloatParam()
	{
		$alpha = new Crystal_Validation_Numeric(12.12);
		$this->assertTrue($alpha->result, 'Numeric validation with Numeric  should be true');

	}

       

}
