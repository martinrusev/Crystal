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
class Crystal_Methods_Postgres_Expression
{

    

    function __construct($method, $expression)
    {
		
		
		switch ($method) 
		{
		case 'minimum':
		$this->expression = "SELECT MIN(" . $expression[0]  . ") AS " . $expression[0] ." " ;
		break;
		
		case 'maximum':
		$this->expression = "SELECT MAX(" . $expression[0]  . ") AS " . $expression[0] ." " ;
		break;
		
		case 'average':
		$this->expression = "SELECT AVG(" . $expression[0]  . ") AS " . $expression[0] ." " ;
		break;
		
		case 'summary':
		$this->expression = "SELECT SUM(" . $expression[0]  . ") AS " . $expression[0] ." " ;
		break;
		
		default:
		throw new Crystal_Methods_Postgres_Expression("Undefined expression:  " . $method);
		break;
		}

    	
		
      
    }

    public function __toString() 
	{
        return $this->expression;
    }
    
    
}