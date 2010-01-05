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
class Crystal_Manipulation_Mysql_Rename 
{

    

    function __construct($method, $params)
    {
    	
		
	
	    	$this->rename = "RENAME TABLE"  . Crystal_Helper_Mysql::add_apostrophe($params[0]);
	    	
			$this-> rename .= "TO";
			
			$this->rename .= Crystal_Helper_Mysql::add_apostrophe($params[1]);
	  		
	
	}
		
      
    

    public function __toString() 
	{
        return $this->rename;
    }
    
    
}




//RENAME TABLE current_db.tbl_name TO other_db.tbl_name;
