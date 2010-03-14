<?php
/**
 * Crystal 
 *
 * An open source application for database manipulation
 *
 * @package		Crystal 
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.4
 */

// ------------------------------------------------------------------------
class Crystal_Validation_Ip
{

    public $result;
    
    function __construct($param=null)
    {
		
       if(isset($param) && !is_array($param))
       {

      
        $validate = preg_match("/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/",
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