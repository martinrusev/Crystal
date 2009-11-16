<?php
/**
 * MicroORM
 *
 * An open source application for database manipulation
 *
 * @package		MicroORM
 * @author		Martin Rusev
 * @link		http://orm.martinrusev.net
 * @since		Version 0.1
 * @version     0.1
 */

// ------------------------------------------------------------------------

class Crystal_Error_Validation 
{

    static function get_validation_error($method=null, $fields=null)
    {

        include(CRYSTAL_BASE . CRYSTAL_DS . 'messages' . CRYSTAL_DS .  'validation_errors.php');

        /** IF $error is array filter coresponding key **/
        $error_string = (is_array($method))? $method[0]: $method;
		
		
        if(isset($validation[$error_string]))
        {

           /** CHECKS ERROR ARRAY FOR PARAMETERS TO PASS IN ERROR MESSAGE **/
           if(is_array($fields))
           {
              $total_params = count($error);

               switch ($total_params)
               {
                    case 2:
                    $message = sprintf($validation[$error_string], $error_string , $error[1]);
                    break;

                    case 3:
                    $message = sprintf($validation[$error_string], $error_string , $error[1], $error[2]);
                    break;

                    default:
                    break;
                }

               $message = sprintf($validation[$error_string], $error_string , $error[1], $error[2]);

          


           }
           else
           {

                $message = sprintf($validation[$error_string], $method);
               
           }



            return $message;
                

        }
        else
        {
            print "Non existing key for " . $error_string;
        }

		

        
    }

   

    



  

    
}