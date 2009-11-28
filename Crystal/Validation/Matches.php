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
class Crystal_Validation_Matches
{

    public $result;

    function __construct($value=null, $match=null)
    {

		$match_string = (is_array($match))?$match[0]:$match;
		
		
        if(isset($value) && is_string($match_string))
        {

            if($value == $match_string)
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