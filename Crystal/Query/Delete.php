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
class Crystal_Query_Mysql_Delete 
{

    
	
	/** TODO - MASS DELETE FUNCTION
	 *  description delete('table1','table2');
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $table)
    {
		
    	
	 $this->delete = "DELETE FROM " . Crystal_Helper_Mysql::add_apostrophe($table[0]);
    	
		
      
    }

    public function __toString() 
	{
        return $this->delete;
    }
    
    
}