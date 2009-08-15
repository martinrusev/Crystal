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
class Crystal_Query_Postgres_Having 
{

    
    function __construct($method, $params)
    {
		
		
		
		$this->having .= " HAVING "; 
		
		
		if(is_array($params))
		{
			
			if(isset($params[1]))
			{
				$this->having .= Crystal_Helper::sanitize_string($params[0])
				. " = "  . Crystal_Helper::add_single_quote($params[1]);	
				
			}
			else
			{
				$this->having .= $value;
			}
			
			
			
			
		}
		else
		{
		
			$this->having = FALSE;
		
		}
		
		
		
		
      
    }

    public function __toString() 
	{
        return $this->having;
    }
    
    
}