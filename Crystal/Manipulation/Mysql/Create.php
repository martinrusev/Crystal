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
class Crystal_Manipulation_Mysql_Create 
{

    
	
	/** TODO - MASS DELETE FUNCTION
	 *  
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params)
    {
    	
	
	    switch ($method) 
		{
	    	case 'create_database':
	    	$this->create = "CREATE DATABASE " . Crystal_Helper::add_apostrophe($params[0]);
	    	break;
			
			
			case 'create_table':
	    	$this->create = "CREATE TABLE " . Crystal_Helper::add_apostrophe($params[0]) . " (%s)";
			
			/** TABLE OPTIONS **/
			if(isset($params[1]) && !empty($params[1]))
			{
				$this->create .= self::parse_table_options($params[1]);
			}
	    	break;
	    	
	    	default:
	       	break;
	    }
		
	
	}
	
	
	function parse_table_options($params)
	{
		
		$this->options = '';
		
		if(array_key_exists('engine', $params))
		{
			
			$this->options .= " ENGINE = " .$params['engine'];
			
		}
		
		if(array_key_exists('char_set', $params))
		{
			
			$this->options .= " CHARACTER SET " .$params['char_set'];
			
		}
		
		
		if(array_key_exists('collation', $params))
		{
			
			$this->options .= " COLLATE " .$params['collation'];
			
		}
		
		return $this->options;
		
		
		
	}
	
    	
		
      
    

    public function __toString() 
	{
        return $this->create;
    }
    
    
}