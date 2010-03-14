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
 * @version     0.4
 */

// ------------------------------------------------------------------------
class Crystal_Validation_Regexp
{

     public $result;

    function __construct($string=null, $pattern=null)
    {
		
		$pattern = (is_array($pattern)?$pattern[0]:$pattern);
    	
        if(isset($string) && isset($pattern))
        {

           $regexp =  preg_match($pattern, $string);
          

           if($regexp == TRUE)
           {
               $this->result = TRUE;
           }
           else
           {
               $this->result = FALSE;
           }
            

        }
        else
        {
            $this->result = FALSE;
        }
       

    }


    function  __toString()
    {
        return $this->result;
    }

}
/* END OF FILE **/