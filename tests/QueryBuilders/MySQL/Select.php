<?php

require(CRYSTAL_ROOT_DIR . 'Methods' . DIRECTORY_SEPARATOR . 'Mysql' . DIRECTORY_SEPARATOR .  'Helper.php');
require(CRYSTAL_ROOT_DIR . 'Methods' . DIRECTORY_SEPARATOR . 'Mysql' . DIRECTORY_SEPARATOR .  'Select.php');

class TestOfSelectMysql extends UnitTestCase
{


	function TestStringParam()
	{
		$method = new Crystal_Methods_Mysql_Select('select','column');
               
		$this->assertEqual($method->select, 'SELECT `column` ');
	}


        
	function TestArrayParam()
	{
		$method = new Crystal_Methods_Mysql_Select('select', array('column'));
		$this->assertEqual($method->select, 'SELECT `column` ');

	}


	function TestEmptyParam()
	{
		$method = new Crystal_Methods_Mysql_Select();
		$this->assertFalse($method->select, 'MySQL SELECT with no params should be false');

	}
        

}