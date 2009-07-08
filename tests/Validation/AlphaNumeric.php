<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'AlphaNumeric.php');

class TestOfAlphaNumericValidation extends UnitTestCase
{
	
	
	function TestStringParam()
	{
		$alpha = new Crystal_Validation_AlphaNumeric('test233');
		$this->assertTrue($alpha->result, 'Alpha numeric validation with string should be true');
	}
	
	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_AlphaNumeric(array('test'));
		$this->assertFalse($alpha->result, 'Alpha  numeric validation with array should be false');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_AlphaNumeric();
		$this->assertFalse($alpha->result, 'Alpha numeric validation with no params should be false');	
		
	}
	
}
