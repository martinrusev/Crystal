<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'MaxLength.php');

class TestOfMaxLengthValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_MaxLength('test');
		$this->assertFalse($alpha->result, 'MaxLength validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_MaxLength(array('test'));
		$this->assertFalse($alpha->result, 'MaxLength validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_MaxLength();
		$this->assertFalse($alpha->result, 'MaxLength validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_MaxLength('cat',5);
		$this->assertTrue($alpha->result, 'MaxLength validation with MaxLength  should be true');

	}

        function TestInValidParam()
	{
		$alpha = new Crystal_Validation_MaxLength('cat',1);
		$this->assertFalse($alpha->result, 'MaxLength validation with MaxLength  should be false');

	}

}
