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
class Crystal_Methods_Postgres_Count
{

    

    function __construct($table)
    {
				
       $this->count = "SELECT COUNT(*) as total FROM" . Crystal_Methods_Helper::sanitize_string($table);
     	     
    }

    public function __toString() 
	{
        return $this->count;
    }
    
    
}