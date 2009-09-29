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
class Crystal_Query_Mysql_Limit 
{

    

    function __construct($method, $limit_params)
    {
		
		
	 	if(isset($limit_params[0]) && isset($limit_params[1]))
        {
            
			$this->limit = " LIMIT " . $limit_params[0] . ',' . $limit_params[1];

        }
        else
        {
            $this->limit = FALSE;
        }
    	
		
      
    }

    public function __toString() 
	{
        if(is_string($this->limit))
		{
			return $this->limit;
		}
		else
		{
			echo "Limit must be string";
			exit;
		}
		
    }
    
    
}