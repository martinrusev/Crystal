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
class Crystal_Validation_Boolean
{
	
	public $result;
	
    function __construct($param = null)
    {
    	
		$accepted_values = array('1','TRUE','on');
		
		
		if(isset($param[0]) && in_array($param[0], $accepted_values))
		{
			$this->result = TRUE;
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
/* END OF FILE */ 