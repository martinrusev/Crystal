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
	
	/**
	*  @var field_data = numeric
	*  @var params = array(numeric, numeric)
	*/
    function __construct($field_data, $params = null)
    {

		$required_params = count($params);
		
		if($required_params == '2')
		{
			
			if($field_data > $params[0] && $field_data < $params[1])
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