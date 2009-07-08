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
class Crystal_Methods_Mysql_Where
{

    

    function __construct($method, $params = null)
    {
		
		$first_element = key($params);
		$last_element = end($params);
		
		
		switch ($method) 
		{
		
		case 'where':
		if($first_element == '0')
		{
			if(isset($params[1]))
			{
				$this->where .= " WHERE " . Crystal_Methods_Mysql_Helper::add_apostrophe($params[0])
				. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($params[1]);
				
			}
			else
			{
				$this->where .= " WHERE " . Crystal_Methods_Mysql_Helper::add_apostrophe($params[0]);
			}
				
		}
		else
		{
			
			foreach($params as $key => $value)
			{
          		
	            if($key == $first_element)
	            {
	            	
					$this->where .= " WHERE " . Crystal_Methods_Mysql_Helper::add_apostrophe($key)
					. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value);
	            }
	            else
	            {
					$this->where .= " AND " . Crystal_Methods_Mysql_Helper::add_apostrophe($key)
					 . " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value);
	            }

			}
			
		}

		
		break;
		
		
		case 'and':
		if($first_element == '0')
		{
			if(isset($params[1]))
			{
				$this->where .= " AND " . Crystal_Methods_Mysql_Helper::add_apostrophe($params[0])
				. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($params[1]);
				
			}
			else
			{
				$this->where .= " AND " . Crystal_Methods_Mysql_Helper::add_apostrophe($params[0]);
			}
				
		}
		else
		{
			
			foreach($params as $key => $value)
			{
          		
	            if($key == $first_element)
	            {
	            	
					$this->where .= " AND " . Crystal_Methods_Mysql_Helper::add_apostrophe($key)
					. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value);
	            }
	            else
	            {
					$this->where .= " AND " . Crystal_Methods_Mysql_Helper::add_apostrophe($key)
					 . " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value);
	            }

			}
			
		}
		break;
		
		case 'or':
		
		
		if($first_element == '0')
		{
				$this->where .= " OR " . Crystal_Methods_Mysql_Helper::add_single_quote($params[0]);
		}
		else
		{
			
			foreach($params as $key => $value)
			{
           
			$this->where .= " OR " . Crystal_Methods_Mysql_Helper::add_apostrophe($key)
			. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value);
           
			}
			
		}
		
		
		break;
		
		case 'in':

		$this->where .= " IN (";
		
		foreach($params as $key => $value)
		{
			if($value != $last_element)
			{
				$this->where .= Crystal_Methods_Mysql_Helper::add_apostrophe($value) .",";
			}
			else
			{
				$this->where .= Crystal_Methods_Mysql_Helper::add_apostrophe($value);
			}
			
		}
		$this->where .= ")";
		break;
		
		
		
		case 'like':

		$this->where .= " LIKE ";
		$this->where .= Crystal_Methods_Mysql_Helper::add_single_quote("%" . $params[0] . "%") ;

		break;
		
		
		default:
		throw new Crystal_Methods_Mysql_Exception("Invalid method: " . $method);
		break;
		}

		
		
    	
		
      
    }

    public function __toString() 
	{
        return $this->where;
    }
    
    
}