<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Comparsion.php');

class TestOfComparsionValidation extends UnitTestCase
{
	
	
	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Comparsion('test');
		$this->assertFalse($alpha->result, 'Comparsion validation with string should be true');
	}
	
	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Comparsion(array('test'));
		$this->assertFalse($alpha->result, 'Comparsion validation with array having one element should be false');
		
	}
	
	
	function TestValidLessOrEqualParam()
	{
		$alpha = new Crystal_Validation_Comparsion('5', array('<=', '7'));
		$this->assertTrue($alpha->result, 'Comparsion validation with less or equal param should be true');
		
	}
	
	function TestValidEqualParam()
	{
		$alpha = new Crystal_Validation_Comparsion('7', array('=', '7'));
		$this->assertTrue($alpha->result, 'Comparsion validation with equal param should be true');
		
	}
	
	function TestValidMoreOrEqualParam()
	{
		$alpha = new Crystal_Validation_Comparsion('8', array('>=', '7'));
		$this->assertTrue($alpha->result, 'Comparsion validation with more or equal param should be true');
		
	}
	
	function TestValidMoreParam()
	{
		$alpha = new Crystal_Validation_Comparsion('8', array('>', '7'));
		$this->assertTrue($alpha->result, 'Comparsion validation with more param should be true');
		
	}
	
	function TestValidLessParam()
	{
		$alpha = new Crystal_Validation_Comparsion('5', array('<', '7'));
		$this->assertTrue($alpha->result, 'Comparsion validation with less param should be true');
		
	}
	
	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Comparsion();
		$this->assertFalse($alpha->result, 'Comparsion validation with no params should be false');	
		
	}
	
}
