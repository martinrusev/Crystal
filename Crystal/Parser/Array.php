<?php
class Crystal_Parser_Array
{
	
	public static function parse($string)
	{
		
		/** Check for | separator **/
		$separator = strpos($string, '|');
	
		
		if(isset($separator) && $separator != False)
		{
			$parsed_string = explode('|', $string);
			
			return $parsed_string;
			
		}
		else
		{
			
			return $string;
			
		}
	}
	
		
}