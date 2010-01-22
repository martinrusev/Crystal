<?php
require_once(CRYSTAL_ROOT_DIR . 'Crystal.php');

class TestOfGroupbyMysql extends UnitTestCase
{
	
	function __construct()
	{
		echo '<h2>Testing Crystal group_by() function</h2>';
		$this->db = Crystal::db();
	}


	function TestStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->group_by('product_id');	   
		$this->assertEqual($method->sql, " GROUP BY 'product_id' ");
	}
	
	
	function TestMultipleStringsParam()
	{
		$this->db->clear_sql();
		$method = $this->db->group_by('product_id, category_id');	   
		$this->assertEqual($method->sql, " GROUP BY 'product_id'  ,  'category_id' ");
	}


        
	function TestArrayParam()
	{
		$this->db->clear_sql();
		$method = $this->db->group_by(array('product_id', 'category_id'));
		$this->assertEqual($method->sql, " GROUP BY 'product_id'  ,  'category_id' ");

	}
	
	function TestEmptyParam()
	{
		$this->db->clear_sql();
		$method = $this->db->group_by();
		$this->assertFalse($method->sql, 'MySQL group_by with no params should be false');

	}
	
        

}