<?php
require_once(CRYSTAL_ROOT_DIR . 'Crystal.php');
$config_file = CRYSTAL_ROOT_DIR . 'db_config.php';


class TestCongigurationOptions extends UnitTestCase
{
	
	function __construct()
	{
		echo '<h2>Testing Crystal configuration options</h2>';

	}
	
	
	function TestBlankCongigurationParam()
	{
		
		$method = Crystal::db();
		$test_object = (is_object($method->conn))?'True':'False';   
		$this->assertTrue($test_object);
	}
	
	
	function TestAlternativeCongigurationParam()
	{
		
		$method = Crystal::db('production');
		$test_object = (is_object($method->conn))?'True':'False';   
		$this->assertTrue($test_object);
	}
	
	
	
	function TestCongigurationArrayParam()
	{
		
		$method = Crystal::db($config_mysql);
		$test_object = (is_object($method->conn))?'True':'False';   
		$this->assertTrue($test_object);
	}
	
	
	function TestAlternativeconfigFileParam()
	{
		
		$method = Crystal::db($config_file, 'production');
		$test_object = (is_object($method->conn))?'True':'False';   
		$this->assertTrue($test_object);
	}
	
	
	
	

}