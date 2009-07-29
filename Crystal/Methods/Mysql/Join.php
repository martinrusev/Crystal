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
class Crystal_Methods_Mysql_Join 
{

    
	
	/** TODO - MASS DELETE FUNCTION
	 *  description delete('table1','table2');
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params)
    {
		
		/** TODO - Rewrite the join method with more flexible solution **/
		switch ($method) 
		{
		case 'left_join':
		$this->join = "LEFT JOIN " . Crystal_Methods_Helper::add_single_quote($params[0]) . " ON " . $params[1];
		break;
		
		
		case 'right_join':
		$this->join = "RIGHT JOIN " . Crystal_Methods_Helper::add_single_quote($params[0]) . " ON " . $params[1];
		break;
		
		
		case 'outer_join':
		$this->join = "OUTER JOIN " . Crystal_Methods_Helper::add_single_quote($params[0]) . " ON " . $params[1];
		break;
		
		
		case 'inner_join':
		$this->join = "INNER JOIN " . Crystal_Methods_Helper::add_single_quote($params[0]) . " ON " . $params[1];
		break;
		
		
		default:
		$this->join = "JOIN " . Crystal_Methods_Helper::add_single_quote($params[0]) . " ON " . $params[1];
		break;
		}

	 	
    	
		
      
    }

    public function __toString() 
	{
        return $this->join;
    }
    
    
}