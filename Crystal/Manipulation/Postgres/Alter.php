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
class Crystal_Manipulation_Postgres_Alter 
{

    

    function __construct($method, $params)
    {
    	
	
	    switch ($method) 
		{
	    	case 'alter_table':
	    	$this->alter = "ALTER TABLE"  . Crystal_Helper_Postgres::add_single_quote($params[0]);
	    	break;
			
	    	
	    	default:
	       	break;
	    }
		
	
	}
		
      
    

    public function __toString() 
	{
        return $this->alter;
    }
    
    
}