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

class Crystal_Validation_Alpha
{

	public $result; 
		
    function __construct($param = null)
    {
    	
	
        if(ctype_alpha($param))
        {
			
			$this->result = TRUE;
			
        }
		else
		{
			
			$this->result = FALSE;
			
         
		}
        
    }
	
	public function __toString() 
	{
        return (string)$this->result;
    }
	
	
    
}
?>
