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
class Crystal_Query_Update 
{

    

    function __construct($method, $params)
    {
				
		/** CHECKS  TABLE **/
		if(is_string($params[0]))
		{
			$table = $params[0];
		}
		else
		{
			throw new Crystal_Query_Exception("Expecting string for table in update() function");
		}
		
		
		/** CHECK COLUMNS **/
		if(is_array($params[1]))
		{
		    $data = $params[1];
		}
		else
		{
			throw new Crystal_Query_Exception("Expecting array for data in update() function");
		}
		
		
		
		$this->update = "UPDATE " . Crystal_Helper_Mysql::add_apostrophe($table) . " SET ";



        if(isset($data))
        {
			
			if($method == 'update_safe')
			{
				$this->update .= Crystal_Helper_Mysql::escape_update_values_safe($data);
			}
			else
			{
				$this->update .= Crystal_Helper_Mysql::escape_update_values($data);
			}
            

        }
		
	 
        return $this->query;
      
    }

	
    
}