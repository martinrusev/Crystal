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
class Crystal_Manipulation_Postgres_Drop 
{

    
	
	/** TODO - MASS DELETE FUNCTION
	 *  description delete('table1','table2');
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params)
    {
	
	
		switch ($method) 
		{
			case 'drop_table':
			$this->drop = "DROP TABLE IF EXISTS " . $params[0];
			break;
			
			case 'drop_database':
			$this->drop = "DROP DATABASE " . $params[0];
			break;	
			
			default:	
			break;
		}
	
	
    }

    public function __toString() 
	{
        return $this->drop;
    }
    
    
}