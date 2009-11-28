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
class Crystal_Query_Mysql_Insert 
{

    

    function __construct($method, $params)
    {
    	
		
		/** CHECKS  TABLE **/
		if(is_string($params[0]))
		{
			$table = $params[0];
		}
		else
		{
			throw new Crystal_Methods_Mysql_Exception("Expecting string for table in insert() function");
		}
		
		
		/** CHECK COLUMNS **/
		if(is_array($params[1]))
		{
		    $data = $params[1];
		}
		else
		{
			throw new Crystal_Methods_Mysql_Exception("Expecting array for data in insert() function");
		}
		
		
		
	 	  $columns_temp = array_keys($data);
		  foreach($columns_temp as $column_value){$columns[] = Crystal_Helper_Mysql::add_apostrophe($column_value);}
	    
	    
		 $values_temp = array_values($data);
		
	
		 foreach($values_temp as $value){$values[] = Crystal_Helper_Mysql::add_single_quote($value);}
		
	    
		
			
		
		    $this->insert = "INSERT INTO " . Crystal_Helper_Mysql::add_apostrophe($table);
		    $this->insert .= '(' . implode(', ' , $columns) . ')';
		    $this->insert .= " VALUES ";
		    $this->insert .= '(' . implode(', ' , $values) . ')';
    		
		
		
		
      
    }

	public function __toString() 
	{
		
		
		if(is_string($this->insert))
		{
			return $this->insert;
		}
		else
		{
			echo "Limit must be string";
			exit;
		}
		
	}
    
    
}