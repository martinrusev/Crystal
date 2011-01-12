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
class Crystal_Query_Expression
{

   
    function __construct($method, $expression)
    {
		
		
		switch ($method) 
		{
			case 'min':
				$this->query->sql = "SELECT MIN(?) AS ?";
				$this->query->params = $expression[0];
				$this->query->type = 'min';
			break;
			
			case 'max':
				$this->query->sql = "SELECT MAX(?) AS ?";
				$this->query->params = $expression[0];
				$this->query->type = 'max';
			break;
			
			case 'average':
				$this->query->sql = "SELECT AVG(?) AS ?";
				$this->query->params = $expression[0];
				$this->query->type = 'average';
			break;
			
			case 'summary':
				$this->query->sql = "SELECT SUM(?) AS ?";
				$this->query->params = $expression[0];
				$this->query->type = 'summary';
			break;
			
			default:
				throw new Crystal_Query_Expression("Undefined expression:  " . $method);
			break;
		}

    	
		return $this->query;
      
    }

    
}