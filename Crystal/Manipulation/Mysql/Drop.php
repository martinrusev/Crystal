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
class Crystal_Manipulation_Mysql_Drop 
{

    
	
	/** TODO - MASS DELETE FUNCTION
	 *  description delete('table1','table2');
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $database)
    {
		
    	
	 $this->drop = "DROP DATABASE " . Crystal_Helper::add_apostrophe($database[0]);
    	
		
      
    }

    public function __toString() 
	{
        return $this->drop;
    }
    
    
}