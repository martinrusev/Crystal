<?php
class Crystal_Parser_String
{
	/**
	 *  Parse parameters for the database manipulation class
	 * @param unknown_type $string
	 */
	static function parse($string)
	{
		
		/** Check for comma **/
		$comma = strpos($string, ',');
		
		/** Multiple params **/
		if($comma != False)
		{
			$params = explode(',', $string);

			/** Check every param for special exceptions ':' **/
			foreach($params as $k => $v)
			{
				/** Check for colon **/
				$colon = strpos($v, ':');
				
				if($colon != False)
				{
					
			
					$params[$k] = self::_process_string_with_colon($v);
	
					
	
				}
				else
				{
					$params[$k] = trim($v);
				}
							
			}
				
			return $params;
			
		}
		else
		{	
			/** Single column **/
			$colon = strpos($string, ':');
			
			if($colon != False)
			{
				$formated_string = self::_process_string_with_colon($string);
				
				return $formated_string;
			}
			else
			{
				return trim($string);
			}
		
		}
		
		
		
		
	}
	
	static public function parse_validation($string)
	{
		
		/** Check for comma **/
		$comma = strpos($string, ',');
		$regex = preg_match('/regex/', $string);
		
		
		/** Multiple params **/
		if($comma != False && $regex == False)
		{
			$rule_parts = explode(',', $string);
			
			foreach($rule_parts as $key => $rule_param)
			{
				if($key == '0')
				{	
					$rule = self::_process_rule_string($rule_param);

				}
				else
				{
					$parse_rule_param = self::_process_validation_string($rule_param);
					
					
					foreach($parse_rule_param as $key => $value)
					{
						$rule[$key] = $value;
					}
					
				}
				
				
			}
			
			
		}
		else
		{
			$rule = self::_process_rule_string($string);

			
		}
		
		
		
		return $rule;
		
	}
	
	private static function _process_rule_string($string)
	{
		
		
		/** CHECKS FOR COLON - rules with parameter **/
		$colon = strpos($string, ':');
		
		if($colon != False)
		{ 
			
			$split_string = explode(':', $string);
			
			$cleared_rule = trim($split_string[0]);
			$clear_params = trim($split_string[1]);
			
			/** Checks for parenthesis **/
			$parenthesis = strpos($clear_params, "(");
			
			if($parenthesis != False or is_numeric($parenthesis))
			{
				$rule['rule'] = $cleared_rule;
				
				$filter_params = preg_match('#\((.*?)\)#', $clear_params, $match);
				
				$rule['params'] = explode(' ', trim($match[1]));
				
			}
			else
			{
				
				$rule['rule'] = $cleared_rule;
				$rule['params'] = trim($split_string[1]);
			}
			
				
			
			
		}
		else
		{
			$rule['rule'] = trim($string);
		}
		

		return $rule;
		
	}
	
	
	private static function _process_validation_string($string)
	{
		
		$colon = strpos($string, ':');
		
		if($colon != False)
		{
			$key_value = explode(':', $string);

			$param_array[trim($key_value[0])] = trim($key_value[1]);
			
			return $param_array;
			
			
		}
		else
		{
			return $string;
		}
		
		
		
	}
	
	private static function _process_string_with_colon($string)
	{
		
		
		
		/** Explode params to array 
		* 
		*  $explode_params[0] is the column name
		*  $explode_params[1] is the special character :
		*  $explode_params[2] is the value
		* 
		*/
		$explode_params = explode(' ', trim($string));
		
		$params = array();
		$params['column'] = trim($explode_params[0]);
		$params['value'] = trim($explode_params[2]);
							
							
		/** Now checking for special params **/
		$as = strpos($string, ':as');
			
			if($as != False)
			{
				$params['param'] = 'AS';
			}
			else
			{
				$params['param'] = '=';
			}	
		
		return $params;	
	
	}
	
	
	
	
	
}