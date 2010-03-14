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
	
	
	function TestValidIntegerParam()
	{
		$alpha = new Crystal_Validation_Between('7', array('6', '8'));
		$this->assertTrue($alpha->result, 'Between with valid integer param should be true');
		
	}
	
	function TestValidStringParam()
	{
		$alpha = new Crystal_Validation_Between('test', array('3', '5'));
		$this->assertTrue($alpha->result, 'Between with valid string param should be true');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Between();
		$this->assertFalse($alpha->result, 'Between validation with no params should be false');	
		
	}
	
}
