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
class Crystal_Query_Mysql_From 
{

    

    function __construct($method, $table)
    {
    	
		
        $this->_from = "FROM" . Crystal_Methods_Helper::add_apostrophe($table[0]);
      
    }

    public function __toString() 
    {

        return $this->_from;
    
    
    }
    
    
}