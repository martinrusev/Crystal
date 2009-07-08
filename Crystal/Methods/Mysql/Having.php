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
class Crystal_Methods_Mysql_Having 
{

    
	/** TODO - write the method **/
    function __construct($method, $params)
    {
		
		
		
		$this->having .= " HAVING "; 
		
			
		foreach($params as $key => $value)
		{
            $first_element = key($params);
			$last_element = end($params);
			/* HAVING PARAM IS STRING **/
			if($first_element == '0')
			{
				
				$this->having .= $value;
			}
            elseif($value != $last_element)
            {
            	
				$this->having .= Crystal_Methods_Mysql_Helper::add_apostrophe($key)
				. " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value) .", ";
            }
            else
            {
				$this->having .= Crystal_Methods_Mysql_Helper::add_apostrophe($key)
				 . " = "  . Crystal_Methods_Mysql_Helper::add_single_quote($value) ;
            }

		}
		
      
    }

    public function __toString() 
	{
        return $this->having;
    }
    
    
}