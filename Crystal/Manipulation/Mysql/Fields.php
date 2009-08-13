<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------
class Crystal_Manipulation_Mysql_Fields
{

	private $primary_key;
    
	
	/** TODO - MASS DELETE FUNCTION
	 *  
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params)
    {
   
	$this->fields = '';
		
    foreach ($params as $column => $rows) 
	{
		$this->fields .= Crystal_Helper::add_apostrophe($column);  
		
		$this->fields .= self::process_rows($rows, $column);
			
    }
	
	if(isset($this->primary_key))
	{
		$this->fields .= $this->primary_key;
	}
	
	

    	
		
      
    }
	
	
	function process_rows($rows, $column)
	{
		$this->row = '';
	
	
		if(array_key_exists('type', $rows))
		{
			$this->row .= strtoupper($rows['type'])  . " ";
		}
		
		
		if(array_key_exists('constraint', $rows))
		{
			$this->row .=  "(" .  $rows['constraint'] . ")";
		}
		
		
		
		if(array_key_exists('null', $rows))
		{
			$this->row .=  " NULL";
		}
		else
		{
			$this->row .=  " NOT NULL ";
		}
		
		
		if(array_key_exists('auto_increment', $rows))
		{
			$this->row .=  " AUTO INCREMENT ";
			
		}
		
		
		if(array_key_exists('primary_key', $rows))
		{
			$this->primary_key =  "PRIMARY KEY ( " . Crystal_Helper::add_apostrophe($column) . ")";
			
		}
		
		
		$this->row .= ",";
		
		return $this->row;
		
	}
	

    public function __toString() 
	{
        return $this->fields;
    }
    
    
}