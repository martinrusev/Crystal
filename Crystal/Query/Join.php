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
class Crystal_Query_Join 
{

    function __construct($method, $params)
    {
		
		switch ($method) 
		{
			case 'left_join':
				$this->query->sql = "LEFT JOIN ? ON ?";
				$this->query->params = $params;
				$this->query->type = 'left_join';
			break;
			
			
			case 'right_join':
				$this->query->sql = "RIGHT JOIN ? ON ?";
				$this->query->params = $params;
				$this->query->type = 'right_join';
			break;
			
			
			case 'outer_join':
				$this->query->sql = "OUTER JOIN ? ON ?";
				$this->query->params = $params;
				$this->query->type = 'outer_join';
			break;
			
			
			case 'inner_join':
				$this->query->sql = "INNER JOIN ? ON ?";
				$this->query->params = $params;
				$this->query->type = 'inner_join';
			break;
			
			
			default:
				$this->query->sql = "JOIN ? ON ?";
				$this->query->params = $params;
				$this->query->type = 'join';
			break;
		}

	 	
    	
		return $this->query;
      
    }


    
}