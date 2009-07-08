<?php

require(CRYSTAL_ROOT_DIR . 'Validation' . DIRECTORY_SEPARATOR . 'Extension.php');

class TestOfExtensionValidation extends UnitTestCase
{


	function TestStringParam()
	{
		$alpha = new Crystal_Validation_Extension('test');
		$this->assertFalse($alpha->result, 'Extension validation with string should be false');
	}

	function TestArrayParam()
	{
		$alpha = new Crystal_Validation_Extension(array('test'));
		$this->assertFalse($alpha->result, 'Extension validation with array should be false');

	}


        function TestValidParam()
	{
		$alpha = new Crystal_Validation_Extension('test.jpg', array('jpg','bmp'));
		$this->assertTrue($alpha->result, 'Extension validation with valid extension should be true');

	}

         function TestInValidParam()
	{
		$alpha = new Crystal_Validation_Extension('test.psd', array('jpg','bmp'));
		$this->assertFalse($alpha->result, 'Extension validation with wrong extension  should be false');

	}

	function TestEmptyParam()
	{
		$alpha = new Crystal_Validation_Extension();
		$this->assertFalse($alpha->result, 'Extension validation with no params should be false');

	}

}
