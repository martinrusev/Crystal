<?php
/**
 * Crystal 
 *
 * An open source application for database manipulation
 *
 * @package		Crystal 
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.4
 * @version     0.4
 */

// ------------------------------------------------------------------------
class Crystal_Validation_Unique
{

    function __construct($data, $params, $db)
    {
    	
    	/** Check if fields param is set **/
    	if(isset($params['table']))
    	{
    		
    		$check = $db->get($params['table'])->where($params['field'], $data)->fetch_row();

    		if(is_array($check))
    		{
    			$this->result = False;
    		}
    		else
    		{
    			$this->result = True;
    		}
    		
    	}
    	else
    	{
    		throw new Crystal_Validation_Exception('Cannot find "table" param for the unique rule' );
    	}

    }
    
    
    function __toString()
	{
    	
		return $this->result;
    	
	}

}
/* END OF FILE **/