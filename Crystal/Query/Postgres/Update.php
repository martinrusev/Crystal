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
class Crystal_Methods_Postgres_Update 
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
			throw new Crystal_Methods_Postgres_Exception("Expecting string for table in update() function");
		}
		
		
		/** CHECK COLUMNS **/
		if(is_array($params[1]))
		{
		    $data = $params[1];
		}
		else
		{
			throw new Crystal_Methods_Postgres_Exception("Expecting array for data in update() function");
		}
		
		
		
		$this->update = "UPDATE " . Crystal_Methods_Helper::sanitize_string($table) . " SET ";



        if(isset($data))
        {

        $this->update .= Crystal_Methods_Helper::escape_update_values($data);

        }
		
	 	
		
      
    }

	public function __toString() 
	{
		
		
		if(is_string($this->update))
		{
			return $this->update;
		}
		else
		{
			exit;
		}
		
	}
    
    
}