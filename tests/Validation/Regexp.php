<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Regexp.php');

class TestOfRegexpValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Regexp('test');
		$this->assertFalse($alpha->result, 'Regexp validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Regexp(array('test'));
		$this->assertFalse($alpha->result, 'Regexp validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Regexp();
		$this->assertFalse($alpha->result, 'Regexp validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Regexp("abcdef", '/def/i');
		$this->assertTrue($alpha->result, 'Regexp validation with valid regular expression should be true');

	}

       


}
