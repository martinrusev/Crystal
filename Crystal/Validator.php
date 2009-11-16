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
				
				
				/** TODO - ADD MORE HUMAN READABLE VARIABLE NAMES **/
				/* MULTIPLE RULES **/
				$general_rules_type = array_keys($conditions);
				
				
				switch ($general_rules_type[0]) 
				{
				case 'rules':
				
				foreach($conditions['rules'] as $rule_type => $params)
				{
                    $method = $this->_validate_method($rule_type);
                    $method_name = $this->method_prefix . $method;
            
                    $validation = new $method_name($data[$field], $params = null);
                                

                    
                    if($validation->result != TRUE)
                    {
                       
					   $this->errors[$field][] = $this->_assign_error_message($method, $params['message']);

					   $this->passed = FALSE;
                                    
                    }
                                               
						
                }
				break;
				
				
				case 'rule':
					print_r($conditions);
				 	$method = $this->_validate_method($conditions['rule']);
                    $method_name = $this->method_prefix . $method;
				
            		//print_r($params);
                    $validation = new $method_name($data[$field], $params= null);
					
					
					if($validation->result != TRUE)
                    {
                       
					   //echo $field;
					  //echo $conditions['rule'];
					  // echo $conditions['message'];
				$this->errors[$field] = $this->_assign_error_message($conditions['rule'], $conditions['message'] = null, $field);

					   $this->passed = FALSE;
                                    
                    }
					
					
					
				break;
				
				
				default:
				/** TODO - rewrite exception message **/
				throw new Crystal_Validation_Exception("Invalid rules");
				break;
				}


			
			}
		

            
        }
        
           

      
        
    }




    private function _assign_error_message($method, $message = null)
    {

        if(isset($message))
        {
            return $message;
        }
        else
        {
           return Crystal_Error_Validation::get_validation_error($method);
        }

        
    }

    private function _validate_method($method)
    {
	
	  // CHECKS FOR rule => array('rule');
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