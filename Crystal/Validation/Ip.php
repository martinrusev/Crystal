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
class Crystal_Validation_Ip
{

    public $result;
    
    function __construct($param=null)
    {

        /** TODO - rewrite the regular expression - not working as expected every time **/
       if(isset($param) && !is_array($param))
       {

      
        $validate = preg_match("^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}^",
        $param);

      
        if($validate)
        {
           $this->result =  TRUE;
        }
        else
        {
           $this->result =  FALSE;
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