<?php
require_once(CRYSTAL_ROOT_DIR . 'Crystal.php');

class TestOfSelectPostgres extends UnitTestCase
{
	
	function __construct()
	{
		echo '<h2>Testing Crystal select() function</h2>';
		$this->db = Crystal::db();
	}


	function TestStringParam()
	{
		$this->db->clear_sql();
		$method = $this->db->select('column');
		$this->assertEqual($method->sql, 'SELECT column');
	}
	
	
	function TestNotParsedParam()
	{
		$this->db->clear_sql();
		$method = $this->db->select('column, MIN(salary)', False);
		$this->assertEqual($method->sql, 'SELECT column, MIN(salary) ');
	}


        
	function TestArrayParam()
	{
		$this->db->clear_sql();
		$method = $this->db->select(array('column'));
		$this->assertEqual($method->sql, 'SELECT column');

	}
	
	function TestMultipleParams()
	{
		$this->db->clear_sql();
		$method = $this->db->select(('column, another_column'));
		$this->assertEqual($method->sql, 'SELECT column , another_column');

	}
	
	
	function TestStringWithColonParam()
	{
		$this->db->clear_sql();
		$method = $this->db->select('very_long_column :as column');
		$this->assertEqual($method->sql, 'SELECT very_long_column AS column');

	}
	
	
	function TestMultipleParamsWithColonParam()
	{
		$this->db->clear_sql();
		$method = $this->db->select('very_long_column :as column, column ');
		$this->assertEqual($method->sql, 'SELECT very_long_column AS column , column');
	}


	function TestEmptyParam()
	{
		
		$this->db->clear_sql();
		$method = $this->db->select();
		$this->assertFalse($method->sql, 'PostgreSQL SELECT with no params should be false');

	}
        

}