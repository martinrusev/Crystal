<?php

require_once(CRYSTAL_ROOT_DIR . 'Methods' . DIRECTORY_SEPARATOR . 'Mysql' . DIRECTORY_SEPARATOR .  'Helper.php');
require(CRYSTAL_ROOT_DIR . 'Methods' . DIRECTORY_SEPARATOR . 'Mysql' . DIRECTORY_SEPARATOR .  'Orderby.php');

class TestOfOrderbyMysql extends UnitTestCase
{


	function TestStringParam()
	{
		$method = new Crystal_Methods_Mysql_Orderby('orderby', array('product_id', 'ASC'));	   
		$this->assertEqual($method->order, " ORDER BY  'product_id'  ASC");
	}


        
	function TestArrayParam()
	{
		$method = new Crystal_Methods_Mysql_Orderby('orderby', array('product_id' => 'ASC'));
		$this->assertEqual($method->order, " ORDER BY  'product_id'  ASC");

	}


	function TestEmptyParam()
	{
		$method = new Crystal_Methods_Mysql_Orderby();
		$this->assertFalse($method->order, 'MySQL ORDER BY with no params should be false');

	}
        

}