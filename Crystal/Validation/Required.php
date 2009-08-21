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
class Crystal_Validation_Required
{


    public $result;
     
    function __construct($param=null)
    {

       
        if(!isset($param) or empty($param))
        {

            $this->result = FALSE;
        }
        else
        {
            $this->result = TRUE;
        }


    }

    function  __toString()
    {
        return $this->result;
    }

}
/* END OF FILE **/