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
class Crystal_Validation_Numeric
{

     public $result;

    function __construct($string=null)
    {

        if(is_numeric($string))
        {

            $this->result = TRUE;
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