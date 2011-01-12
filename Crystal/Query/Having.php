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
class Crystal_Query_Having 
{

    
    function __construct($method, $params)
    {
		
		if(is_array($params))
		{
			
			if(isset($params[1]))
			{
				$this->query->sql .= " HAVING ? = ?"; 
				$this->query->params = $params;			
			}
			else
			{
				$this->query->sql .= " HAVING ?"; 
				$this->query->params = $params;	
			}
			
			
			
			
		}
		else
		{
		
			$this->having = FALSE;
		
		}
		
		

		return $this->query;
		
      
    }


        
    
}