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
class Crystal_Methods_Mysql_Select 
{

    

    function __construct($method,  $columns)
    {

		$this->select = "SELECT";
		
		
		$last_column =  (end($columns));
		foreach($columns as $value)
		{
			if($value != $last_column)
			{
				$this->select .= Crystal_Methods_Mysql_Helper::add_apostrophe($value) . ", ";
			}
			else
			{
				$this->select .= Crystal_Methods_Mysql_Helper::add_apostrophe($value);
			}
			
		}
		
      
    }

    public function __toString() 
	{
        return $this->select;
    }
    
    
}