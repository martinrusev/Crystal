<?php
class Crystal_Parser_String
{
	
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
	
	
	private function _process_string_with_colon($string)
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