<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Between.php');

class TestOfBetweenValidation extends UnitTestCase
{
	
	
	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Between('test233');
		$this->assertFalse($alpha->result, 'Between validation with string should be false');
	}
	
	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Between(array('test233'));
		$this->assertFalse($alpha->result, 'Between validation with string should be false');
	}
	
	
	function TestValidParam()
	{
		$alpha = new Crystal_Validation_Between(array('6' , '5', '7'));
		$this->assertTrue($alpha->result, 'Between with array should be false');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Between();
		$this->assertFalse($alpha->result, 'Between validation with no params should be false');	
		
	}
	
}
