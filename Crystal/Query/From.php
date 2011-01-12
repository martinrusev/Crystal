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
class Crystal_Query_From 
{

    

    function __construct($method, $table)
    {
    	
		$this->query->type = 'from';
        $this->query->sql = "FROM ?";
        
        /** table alias get('producsts p') 
    	 */
		if(ereg(" ", $table[0])) 
		{
			$this->query->sql = "FROM ? ?";
			$this->query->params = explode(' ', $table[0]);
        	
		}
		else
		{
			$this->query->sql = "FROM ?";
			$this->query->params = $table[0];
			
		} 
		
        return $this->query;
    }


 
    
}