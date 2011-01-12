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
class Crystal_Query_Delete 
{


    function __construct($method, $table)
    {
		
		  $this->query->type = 'delete';
	      $this->query->sql = "DELETE FROM ?";
	      $this->query->params = $table[0];     

	      return $this->query;
		
      
    }

  
    
}