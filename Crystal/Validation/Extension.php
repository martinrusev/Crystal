<?php
/**
 * Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal-project.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------
class Crystal_Validation_Extension
{

    public $result;
    
    function __construct($value=null, $extenstions_array=null)
    {


        if(isset($value) && is_array($extenstions_array))
        {

             $path_info = pathinfo($value);
             $extenstion  = $path_info['extension'];
            

            if(in_array($extenstion, $extenstions_array))
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