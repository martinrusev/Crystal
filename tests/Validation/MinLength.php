<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'MinLength.php');

class TestOfMinLengthValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_MinLength('test');
		$this->assertFalse($alpha->result, 'MinLength validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_MinLength(array('test'));
		$this->assertFalse($alpha->result, 'MinLength validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_MinLength();
		$this->assertFalse($alpha->result, 'MinLength validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_MinLength('category',5);
		$this->assertTrue($alpha->result, 'MinLength validation with MinLength  should be true');

	}

        function TestInValidParam()
	{
		$alpha = new Crystal_Validation_MinLength('cat',5);
		$this->assertFalse($alpha->result, 'MinLength validation with MinLength  should be false');

	}

}
