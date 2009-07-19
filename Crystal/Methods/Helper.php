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
class Crystal_Methods_Helper
{
	
	
	/** ACCEPTS ONLY STRING **/
	static function add_apostrophe($string)
	{
		
		if(is_string($string))
		{
			return strtolower(filter_var($string, FILTER_SANITIZE_STRING));
		}
		else
		{	
			throw new Crystal_Methods_Postgres_Exception("Helper accepts only strings for add_apostrophe function");
		}

        
    }
	
	
	
	/** ACCEPTS ONLY STRING **/
	static function sanitize_string($string)
	{
		
		if(is_string($string))
		{
			return strtolower(filter_var($string, FILTER_SANITIZE_STRING));
		}
		else
		{	
			throw new Crystal_Methods_Postgres_Exception("Helper accepts only strings for add_apostrophe function");
		}

        
    }


    static function add_single_quote($string)
	{
		if(is_string($string))
		{
			return " '" . strtolower(filter_var($string, FILTER_SANITIZE_STRING)) . "' ";
		}
		else
		{	
			throw new Crystal_Methods_Postgres_Exception("Helper accepts only strings for add_single_quote function");
		}
        
    }
	
	static function escape_update_values($cols)
	{

	foreach($cols as $key => $value)
        {

            $updated_cols[] = self::add_apostrophe($key)  . "=" . self::add_single_quote($value);


        }

        $temp = implode(',', $updated_cols);


	return $temp;

    }

}