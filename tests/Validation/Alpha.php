<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Alpha.php');

class TestOfAlphaValidation extends UnitTestCase
{
	
	
	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Alpha('test');
		$this->assertTrue($alpha->result, 'Alpha validation with string should be true');
	}
	
	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Alpha(array('test'));
		$this->assertFalse($alpha->result, 'Alpha validation with array should be false');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Alpha();
		$this->assertFalse($alpha->result, 'Alpha validation with no params should be false');	
		
	}
	
}
