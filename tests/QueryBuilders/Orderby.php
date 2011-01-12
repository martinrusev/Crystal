<?php
require_once(CRYSTAL_ROOT_DIR . 'Crystal.php');

class TestOfOrderbyMysql extends UnitTestCase
{
	
function __construct()
	{
		echo '<h2>Testing Crystal order_by() function</h2>';
		$this->db = Crystal::db();
	}


	function TestStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by('product_id', 'ASC');	   
		$this->assertEqual($method->sql, " ORDER BY  `product_id`  ASC");
	}


        
	function TestArrayParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by(array('product_id' => 'ASC'));
		$this->assertEqual($method->sql, " ORDER BY  `product_id`  ASC");

	}
	
	function TestMultipleArrayParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by(array('product_id' => 'ASC', 'category_id' => 'ASC'));
		$this->assertEqual($method->sql, " ORDER BY  `product_id`  ASC , `category_id`  ASC");
		//echo("<br/>" .$method->sql[31] . "<br/>");

	}
	
	
	function TestMinusMultipleStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by('product_id, -category_id');
		$this->assertEqual($method->sql, " ORDER BY  `product_id`  DESC, `category_id`  ASC");

	}
	
	
	function TestMinusStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by('-category_id');
		$this->assertEqual($method->sql, " ORDER BY  `category_id`  ASC");

	}
	
	
	function TestStandartStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by('category_id');
		$this->assertEqual($method->sql, " ORDER BY  `category_id`  DESC");

	}


	function TestEmptyParam()
	{
		$this->db->clear_sql();
		$method = $this->db->order_by();
		$this->assertFalse($method->sql, 'MySQL ORDER BY with no params should be false');

	}
        

}