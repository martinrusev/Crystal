<?php
/**
 * Crystal 
 *
 * An open source application for database manipulation
 *
 * @package		Crystal	Validation
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.4
 */

class Crystal_ValidatorNew
{

    public $passed;
    
    public $errors = array();


    private $valid_methods = array('alpha' => 'Alpha',
                                   'alpha_numeric' => 'AlphaNumeric',
                                   'between' => 'Between',
                                   'boolean' => 'Boolean',
                                   'comparsion' => 'Comparsion',
                                   'valid_email' => 'Email',
                                   'extension' => 'Extension',
                                   'integer' => 'Integer',
                                   'valid_ip' => 'Ip',
                                   'matches' => 'Matches',
                                   'max_length' => 'MaxLength',
                                   'min_length' => 'MinLength',
                                   'numeric' => 'Numeric',
                                   'regexp' => 'Regexp',
                                   'unique' => 'Unique',
                                   'valid_url' => 'Url',
								   'required' => 'Required'
								   );
								   
	private $method_prefix = "Crystal_Validation_";							   

    function __construct($rules ,$data, $db)
    {

        $this->errors = array();
        $this->passed = TRUE;

		foreach($rules as $field => $conditions)
		{
			
			$parse_rules = Crystal_Parser_Array::parse($conditions[0]);
			
			
			/** Multiple rules for field **/
			if(is_array($parse_rules))
			{
				
				/** clear the parsed rule array **/
				$parsed_rule_params = array();
				
				/** Analyze and parse rules array **/	
				foreach($parse_rules as $rule => $params)
				{
					
					$parsed_rule_params[] = Crystal_Parser_String::parse_validation($params);
							
				}
				
				/** Validate **/
				foreach($parsed_rule_params as $key => $new_params)
				{
					$this->field_type = 'multiple';
					$this->_validate($new_params, $field, $data, $db);
					
				}
				
				
				
			}
			/** Single rule for field **/
			else
			{
				$params = Crystal_Parser_String::parse_validation($parse_rules);
				$this->field_type = 'single';
				$this->_validate($params, $field, $data, $db);
				
			}
			
			
		} 
		
        
    }
    
    /**
     * 
     * @param string with validation conditions $params
     * @param field name $field
     * @param data for validation $data
     * @param database instance $db
     */
    private function _validate($params, $field, $data, $db)
    {
    	$method = $this->_validate_method($params['rule']);
		$method_name = $this->method_prefix . $method;
					
		$assigned_params = $this->_assign_method_params($params);			

		if($method == 'Unique')
		{
			/** Adds default field **/
			if(!isset($assigned_params['field']))
			{
				$assigned_params['field'] = $field;
			}
						
			$validation = new $method_name($data[$field], $assigned_params, $db);
		}
		else
		{
			$validation = new $method_name($data[$field], $assigned_params);
		}
			
					
		if($validation->result === False)
		{

			if($this->field_type == 'single')
			{
				$this->errors[$field] = $this->_assign_error_message($params['rule'] , $field, $params);
			}
			else
			{
				$this->errors[$field][] = $this->_assign_error_message($params['rule'] , $field, $params);
			}
			

			$this->passed = False;
                                    
		}
				
				 	
    	
    	
    }
	
	private function _assign_method_params($params = null)
	{
		
		if(is_array($params))
		{
			
			/** STRIP MESSAGE FROM THE PARAMS **/
			if(isset($params['message']))
			{
				unset($params['message']);
			}
			
			
			/** STRIP RULE FROM PARAMS **/
			if(isset($params['rule']))
			{
				unset($params['rule']);
			}
			
			
			if(empty($params))
			{
				return False;
			}
			else
			{
				/** Backwards compability params **/
				if(isset($params['params']))
				{
					return $params['params'];
				}
				else
				{
					return $params;
				}
				
			}
			

			
		}
		else
		{
			return False;
		}
		
	}




    private function _assign_error_message($method, $field, $params = null)
    {	
		
        if(isset($params['message']) && !empty($params['message']))
        {
        	
            return $params['message'];
        }
        else
        {
        	
           return Crystal_Error_Validation::get_validation_error($method, $field, $params['params']);
        }

        
    }

	
    private function _validate_method($method)
    {

	  $method = (is_array($method))?$method[0]:$method;
	 


      if(array_key_exists($method, $this->valid_methods))
      {
      	return $this->valid_methods[$method];
      }
      else
      {
      	throw new Crystal_Validation_Exception("Cannot find requested validation method: " . $method);
      }
	
        
    }
    
    
    
}