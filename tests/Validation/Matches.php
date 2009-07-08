<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Matches.php');

class TestOfMatchesValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Matches('test');
		$this->assertFalse($alpha->result, 'Matches validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Matches(array('test'));
		$this->assertFalse($alpha->result, 'Matches validation with array should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Matches();
		$this->assertFalse($alpha->result, 'Matches validation with no params should be false');

	}

        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Matches('cat','cat');
		$this->assertTrue($alpha->result, 'Matches validation with Matches  should be true');

	}

        function TestInValidParam()
	{
		$alpha = new Crystal_Validation_Matches('cat','test');
		$this->assertFalse($alpha->result, 'Matches validation with Matches  should be false');

	}

}
