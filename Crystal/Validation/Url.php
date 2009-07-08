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
class Crystal_Validation_Url
{


    public $result;

    function __construct($url=null)
    {


        if(isset($url) && is_string($url))
        {

            $validate = preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url);

            if($validate == TRUE)
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