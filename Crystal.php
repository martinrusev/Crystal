 <?php
/**
 *  Crystal DBAL
 *
 * An open source application for database manipulation
 *
 * @package		Crystal DBAL
 * @author		Martin Rusev
 * @link		http://crystal.martinrusev.net
 * @since		Version 0.1
 * 
 */

// ------------------------------------------------------------------------

/* DEFINE APPLICATION GLOBAL CONSTANTS **/
/**
 *  CONTSTANTS EXPLAINED
 *  EXT - file extension, default '.php'
 *  DS - shortcut for DIRECTORY_SEPARATOR
 *  BASE - THIS FILE DIRECTORY PATH
 *  BASEPATH - absolute path to 'base' directory
 *  LOG - path to 'log'  directory
 */
define('CRYSTAL_DS',  DIRECTORY_SEPARATOR);
define('CRYSTAL_BASE', dirname(__FILE__));
define('CRYSTAL_BASEPATH', CRYSTAL_BASE . CRYSTAL_DS . 'Crystal' . CRYSTAL_DS);


class Crystal
{


    /** DISABLES CLASS INSTANCE **/
    function __construct()
    {
        echo "Crystal is static class, no instances allowed";
        exit;
    }

        
      
    static public function db($connection = null)
    {

        return Crystal_Methods_Common::db($connection);
        
    }     
   
    static public function utilities($connection = null)
    {

        return DB::load_utilities($connection);
        
    }


    static public function validation($rules, $data)
    {


        return new Crystal_Validator($rules, $data);

        
    }
	
	

}


 /** GLOBAL AUTOLOAD FUNCTION 
     *
     *  Simple autoload function 
     *  @param <string> $class_name
     */
    function __autoload($class_name)
    {

   
        $path = str_replace("_", CRYSTAL_DS, $class_name);
        
	
        if(file_exists(CRYSTAL_BASE . CRYSTAL_DS . $path . '.php'))
        {
            include(CRYSTAL_BASE . CRYSTAL_DS . $path . '.php');
        }
        else
        {
           throw new Exception("Cannot find requested class " . $class_name . " in " . $path);
        }
        

        if(!class_exists($class_name))
        {
            throw new Exception("Invalid Class name ". $class_name);
        }
     

    }
   
$db = Crystal::db();

$q = $db->select(array('products','clients'))->from('table')->where('product_id','2')->print_sql();