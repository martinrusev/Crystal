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
 * @version     0.5
 */

// ------------------------------------------------------------------------
class Crystal_Query_Limit 
{

    function __construct($method, $limit_params)
    {
		
		
	 	if(isset($limit_params[0]) && isset($limit_params[1]))
        {
        	$this->query->sql = "LIMIT ?,? ";
        	$this->query->type = 'limit';
			$this->query->params = $limit_params;

			return $this->query;

        }
        else
        {
            return FALSE;
        }
    	
		
      
    }

    
}