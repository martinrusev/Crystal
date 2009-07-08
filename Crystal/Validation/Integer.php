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
class Crystal_Validation_Integer
{

    public $result;

    function __construct($param=null)
    {
        if(is_int($param))
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