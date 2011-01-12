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
class Crystal_Query_Count
{

    

    function __construct($method, $table)
    {
				
       $this->query->type = 'count';
       $this->query->sql = "SELECT COUNT(*) as total FROM ?";
       $this->query->params = $table[0];     
       
       
       
      return $this->query;
    }

    
}