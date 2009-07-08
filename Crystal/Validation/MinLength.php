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
class Crystal_Validation_MinLength
{


    public $result;

    function __construct($string=null, $min_length=null)
    {

       /** checks for min lenght array **/
       $value = (is_array($min_length)) ? $min_length[0]:$min_length;

    
      if(isset($string) && !is_null($value))
        {
         
            $length =  strlen($string);
           

            if($length >= $value)
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