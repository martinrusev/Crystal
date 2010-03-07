<?php
/**
 * Crystal
 *
 * An open source application for database manipulation
 *
 * @package		Crystal
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.4
 */

// ------------------------------------------------------------------------

class Crystal_Error_Validation 
{

    static function get_validation_error($method=null, $field,  $params = null)
    {

        include(CRYSTAL_BASE . CRYSTAL_DS . 'messages' . CRYSTAL_DS .  'validation_errors.php');

        /** IF $error is array filter coresponding key **/
        $error_string = (is_array($method))? $method[0]: $method;
		
		
        if(isset($validation[$error_string]))
        {
        	$sprintf_params = array($validation[$error_string], $field);
        	
        	
        	if(isset($params) && !empty($params))
        	{
	        	foreach($params as $value)
	        	{
	        		array_push($sprintf_params, $value);
	        	}
        		
        	}
        	
        	
      
			$message = call_user_func_array('sprintf', $sprintf_params);

			
			return $message; 
     

        }
        else
        {
            print "Non existing key for " . $error_string;
        }

		

        
    }

   

    



  

    
}