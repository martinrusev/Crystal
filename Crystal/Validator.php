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

class Crystal_Validator
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

    function __construct($rules ,$data)
    {

        $this->errors = array();
        $this->passed = TRUE;


        /**
         *  CHECK EVERY RULE IN $rules array and checks the conditions
         */
        foreach($rules as $field => $conditions)
        {	
		
			if(array_key_exists($field, $data))
			{
				
				$general_rules_type = array_keys($conditions);
				
			
				switch ($general_rules_type[0]) 
				{
				case 'rules':
				
				
				foreach($conditions['rules'] as $rule_type => $params)
				{
                    
				
					/** 
					* 
					*  CHECKS FOR VALIDATION RULE WITHOUT PARAMS 
					*  
					*  Example:
					*  rules = array('email','required);
					**/
					if(is_numeric($rule_type))
					{
						$rule_type = $params;
						unset($params);
						
						
					}
				
					$method = $this->_validate_method($rule_type);
                    $method_name = $this->method_prefix . $method;
            		
					
					$assigned_params = $this->_assign_method_params($params);
					
                    $validation = new $method_name($data[$field], $assigned_params);
                
                    
                    if($validation->result != TRUE)
                    {
                     
					   $this->errors[$field][] = $this->_assign_error_message($rule_type, $field, $params['message']);

					   $this->passed = FALSE;
                                    
                    }
                                               
						
                }
				break;
				
				
				case 'rule':
					
					
				 	$method = $this->_validate_method($conditions['rule']);
                    $method_name = $this->method_prefix . $method;
					
					$assigned_params = $this->_assign_method_params($conditions['rule']);
        		
					$validation = new $method_name($data[$field], $assigned_params);
					
					
					if($validation->result != TRUE)
                    {
                      
					  $this->errors[$field] = $this->_assign_error_message($conditions['rule'], $field, $conditions['message']);

					  $this->passed = FALSE;
                                    
                    }
					
					
					
				break;
				
				
				default:
				throw new Crystal_Validation_Exception("Non existing rule:" . $general_rules_type[0] .' Valid values:rule, rules');
				break;
				}


			
			}
		

            
        }
        
           

      
        
    }
	
	private function _assign_method_params($params = null, $rule_type = null)
	{
		
		
		if(is_array($params))
		{
			
			/** STRIP MESSAGE FROM THE PARAMS **/
			if(isset($params['message']))
			{
				unset($params['message']);
			}
			
			
			
			/** CHECK FOR RULE TYPE **/
			if($params[0] == $rule_type)
			{
				return array_slice($params,1);
			}
			else
			{
				return $params;
			}
			
		}
		else
		{
			return FALSE;
		}
		
	}




    private function _assign_error_message($method, $field, $message = null)
    {	
		
        if(isset($message) && !empty($message))
        {
        	
            return $message;
        }
        else
        {
        	
           return Crystal_Error_Validation::get_validation_error($method, $field);
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