<?php
require_once(CRYSTAL_ROOT_DIR . 'Crystal.php');

class TestOfWherePostgres extends UnitTestCase
{
	
	function __construct()
	{
		echo '<h2>Testing Crystal where() function</h2>';
		$this->db = Crystal::db();
	}
	
	
	function TestArrayParam()
	{
		$this->db->clear_sql();
		$method = $this->db->where(array('product_id' => '1', 'client_id' => '5'));
		$this->assertEqual($method->sql, " WHERE  `product_id`  = '1'  AND  `client_id`  = '5' ");
		//echo("<br/>" .$method->sql[22] . "<br/>");
	
	}
	
	function TestStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->where('product_id','2');
		$this->assertEqual($method->sql, " WHERE  `product_id`  = '2' ");

	
	}
	
	function TestColonParam()
	{
		$this->db->clear_sql();
		$method = $this->db->where('product_id : 2');
		$this->assertEqual($method->sql, " WHERE `product_id` = '2' ");
	
	}
	
	
	function TestMultipleColonParam()
	{
		$this->db->clear_sql();
		$method = $this->db->where('product_id : 2, client_status : active');
		$this->assertEqual($method->sql, " WHERE `product_id` = '2' AND `client_status` = 'active' ");
	
	}
	

	function TestEmptyParam()
	{
		
		$this->db->clear_sql();
		$method = $this->db->where();
		$this->assertFalse($method->sql, 'MySQL SELECT with no params should be false');

	}
        

}