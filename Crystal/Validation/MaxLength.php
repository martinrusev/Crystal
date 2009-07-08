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
class Crystal_Validation_MaxLength
{


    public $result;

    function __construct($string=null, $max_length=null)
    {


       $value = (is_array($max_length)) ? $max_length[0]:$max_length;

        if(isset($string) && !is_null($max_length))
        {

            $length =  strlen($string);

            if($length <= $value)
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