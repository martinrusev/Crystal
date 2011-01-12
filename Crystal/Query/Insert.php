<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.5
 */

// ------------------------------------------------------------------------
class Crystal_Query_Insert 
{
 
    function __construct($method, $params)
    {
    	
    	$this->query->type = 'insert';
		
		/** CHECKS  TABLE **/
		if(is_string($params[0]))
		{
			$this->query->sql = 'INSERT INTO ?';
			$this->query->params[] = $params[0];
			
		}
		else
		{
			throw new Crystal_Query_Exception("Expecting string for table in insert() function");
		}
		
		
		/** CHECK COLUMNS **/
		if(is_array($params[1]))
		{
		    $data = $params[1];
		}
		else
		{
			throw new Crystal_Query_Exception("Expecting array for data in insert() function");
		}
		
		$total_columns = count($params[1]);
		
		$elements = str_repeat('?,', $total_columns);
		// Remove the last comma
		$elements = substr($elements,'',-1);
		
		$this->query->sql .= sprintf("(%s)", $elements);
		$this->query->sql .= sprintf("VALUES(%s)", $elements);
		$this->query->params[] = $params[1];
    		
		
		
		return $this->query;
		
      
    }


    
}