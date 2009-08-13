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
class Crystal_Manipulation_Mysql_Options 
{

    
	
	/** TODO -
	 *  
	 *  
	 * @return string
	 * @param array $table
	 */
    function __construct($method, $params)
    {
    	
		$this->options = '';
    	
		$this->options .= self::process_options($params);
			
      
    }
	
	
	function process_options($options)
	{
		
		$this->options = '';
		
		
		if(array_key_exists('primary_key', $options))
		{
			$this->options .= "PRIMARY KEY (" . Crystal_Helper::add_apostrophe($options['primary_key']) . " ) ";
		}
		
		
	}

    public function __toString() 
	{
        return $this->options;
    }
	
	
	 /* 
	   CREATE TABLE `magento`.`admin_user` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`title` VARCHAR( 128 ) NOT NULL ,
	`content` TEXT NOT NULL ,
	PRIMARY KEY ( `id` )
	) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;
	 */  
    
    
}