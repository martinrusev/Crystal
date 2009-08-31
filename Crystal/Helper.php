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
class Crystal_Helper
{
	
	
	static function add_apostrophe($string)
	{
		
		if(is_string($string))
		{
			return  " `" . htmlentities(self::mysql_real_escape_string_alternative($string), ENT_QUOTES) . "` ";
		}
		else
		{	
			throw new Crystal_Helper_Exception("Helper accepts only strings for add_apostrophe function");
		}

        
    }
	
	
	
	/** ACCEPTS ONLY STRING **/
	static function sanitize_string($string)
	{
		
		if(is_string($string))
		{
			
			return  htmlentities(self::mysql_real_escape_string_alternative($string), ENT_QUOTES); 			
		}
		else
		{	
			throw new Crystal_Helper_Exception("Helper accepts only strings for add_apostrophe function");
		}

        
    }


    static function add_single_quote($string)
	{
		
		
		
		
		if(is_string($string))
		{	
		
			
			return " '" . htmlentities(self::mysql_real_escape_string_alternative($string),ENT_QUOTES) . "' ";
		}
		elseif(is_numeric($string))
		{
			
			return $string;
			
		}
		else
		{	
			throw new Crystal_Helper_Exception("Helper accepts only strings for add_single_quote function");
		}
        
    }
	

	static function add_single_quoute_safe_string($string)
	{
	
		
	 	
		if(is_numeric($string))
		{
			
			return $string;
			
		}
		elseif(is_string($string))
		{
			$parsed_string = self::mysql_real_escape_string_alternative($string);
			
			return "'" . $parsed_string . "'";
			
		}
		else
		{	
			throw new Crystal_Helper_Exception("Helper accepts only strings for add_single_quote function");
		}
		
		
	}
	
	
	static function add_double_quote($string)
	{
		if(is_string($string))
		{
			return '"' . htmlentities(self::mysql_real_escape_string_alternative($string), ENT_QUOTES). '"';
		}
		elseif(is_numeric($string))
		{
			
			return $string;
			
		}
		else
		{	
			throw new Crystal_Helper_Exception("Helper accepts only strings for add_double_quote function");
		}
        
    }
	
	static function escape_update_values($cols)
	{
		
		

		foreach($cols as $key => $value)
        {

           $updated_cols[] = self::add_apostrophe($key)  . "= "  . self::add_single_quote($value)  . " ";


        }

        $temp = implode(',', $updated_cols);


	return $temp;

    }
	
	
	static function escape_update_values_safe($cols)
	{

		foreach($cols as $key => $value)
        {

           $updated_cols[] = self::add_apostrophe($key)  . "="  . self::add_single_quoute_safe_string($value);


        }

        $temp = implode(',', $updated_cols);

	
	    return $temp;

    }
	
	static function clean_db_result($rows)
	{
		
		foreach($rows as $key =>  $column)
		{
				
			if(!is_numeric($column))
			{	
				
			$rows[$key]  = html_entity_decode(stripslashes($column));
			
			}
		
		}
		
		return $rows;
		
		
		
		
	}
	
	function remove_single_quote($value)
	{
		
		$search = array("'");
    	$replace = array("&#039;");

    return str_replace($search, $replace, $value);	
		
	}

	
	function mysql_real_escape_string_alternative($value)
	{
	
	
	return strtr($value, array
	(
		  "\x00" => '\x00',
		  "\n" => '\n', 
		  "\r" => '\r', 
		  '\\' => '\\\\',
		  "\x1a" => '\x1a'
	));
	
		
		
    //$search = array("\x00", "\\", "\x1a", "\n", "\r" );
   // $replace = array("\\x00",  "\\\\" , "\\\x1a", '\n', '\r');

   // return str_replace($search, $replace, $value);
	}

}