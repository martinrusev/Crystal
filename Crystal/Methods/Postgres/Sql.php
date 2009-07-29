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
class Crystal_Methods_Postgres_Sql extends Crystal_Methods_Common
{

    

    function __construct($method, $sql)
    {


	   
		$this->sql = $sql[0];
		
    
      
    }

    public function __toString() 
	{
        return $this->sql;
    }
    
    
}