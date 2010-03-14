<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Boolean.php');

class TestOfBooleanValidation extends UnitTestCase
{
	
	
	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Boolean('test233');
		$this->assertFalse($alpha->result, 'Boolean validation with string should be false');
	}
	
	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Boolean(array('test233'));
		$this->assertFalse($alpha->result, 'Boolean validation with array should be false');
	}
	
	
	function TestValidParam()
	{
		$alpha = new Crystal_Validation_Boolean('1');
		$this->assertTrue($alpha->result, 'Boolean with valid values should be true');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Boolean();
		$this->assertFalse($alpha->result, 'Boolean validation with no params should be false');	
		
	}
	
}
