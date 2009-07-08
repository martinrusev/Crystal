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
class Crystal_Validation_Between
{

	public $result;
	
	
    function __construct($params = null)
    {
		
		$required_params = count($params);
		
		if($required_params == '3')
		{
			
			 if($params[1] < $params[0] && $params[0] < $params[2])
	        {
	        	$this->result = TRUE;
	           
	        }
			else
			{
				$this->result = FALSE;
			}
			
			
		}
		else
		{
			
			$this->result = FALSE;
		}
		
       

    }
	
	function __toString()
	{
		
		return $this->result;
	}

}
/* END OF FILE **/