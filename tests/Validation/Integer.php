<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Integer.php');

class TestOfIntegerValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Integer('test');
		$this->assertFalse($alpha->result, 'Integer validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Integer(array('test'));
		$this->assertFalse($alpha->result, 'Integer validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Integer();
		$this->assertFalse($alpha->result, 'Integer validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Integer(23);
		$this->assertTrue($alpha->result, 'Integer validation with integer  should be true');

	}

}
