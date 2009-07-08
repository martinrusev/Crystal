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
	//$names = array('Spas','martin');
	//$more_names = array('Pesho','Gosho');
	$q = $db->summary('age')->from('clients')->print_sql();;
	//$q = $db->get('clients')->where('id','2')->and('id','2')
	
	
	//$q = $db->summary('age')->from('clients')->print_sql();
	//print_r($q);
	//$q = $db->get('clients')->where('name')->in($names)->or('name')->in($more_names)->print_sql();
	//$q = $db->get('clients')->having(array('name' => 'test', 'martin' => '2test'))->like('m');
   //$result = $db->select('test_table') 
    //->columns(array('title','body'))
   // ->where(array('language_id' => '1'))
  //  ->orderby(array('id' => 'ASC'))
  //  ->limit('0', '1')
  //  ->fetch_element('body');

	/*
$data = array('body'=> 'martin si testva nqkakwvi neshta',
				  'title' => 'I am updated title',
				  'language_id' => '1');
				  
				  
	$db->update('test_table', $data)->where(array('language_id' => '1'))->execute();
*/
	//$q = $db->sql("SELECT system_user()")->fetch_all();
	//$q = $db->select(array('page_title','page_content'))
	//->from('pages')->where(array('page_status' => 'active'))->fetch_object();
	//$q = $db->get('test_table')->fetch_array();
	
	
	//$db->print_sql();	
	//$db->distinct('framework');

	/*
	$db->print_query();
	$db->delete('test_table')
	->where(array('language_id' => '1'))
	->execute();
	/*
	$db->print_query();
    //print_r($result);
*/
$data = array
(
'title' => 't!it',
'password' => '',
'email'=>'jafabv.bg',
'numeric'=> 'd',
'bool' => '1',
'match'=>'cat',
'extension' => 'k.png',
'comparsion' => '5',
'url' => 'http://test.com',
'min_length' => 'sssdfh',
'max_length' => 'sssss',
'between' => '6',

);

/*
$rules = array
(
'title' => array('rule' => 'required','message'=>'Enter value','required' => TRUE),
'password' => array('rule' => 'required'),
'email' => array('rule' => 'valid_email', 'required' => TRUE),
'numeric' => array('rule' => 'alpha_numeric'),
'bool' => array('rule' => 'boolean'),
'match' => array('rule' => array('matches','cat')),
'extension' => array('rule' => array('extension', array('jpg','gif', 'png'))),
'comparsion' => array('rule' => array('comparsion', array('<=','5'))),
'url' => array('rule' => 'valid_url'),
'min_length' => array('rule' => array('min_length','5')),
'max_length' => array('rule' => array('max_length','5')),
'between' => array('rule' => array('between','5', '7'))
);



$rules = array
(
'title' => array('rule' => 'alpha_numeric', 'message'=> 'Enter alpha numeric value', 'required' => TRUE)
);

*/
/*
$advanced_rules = array
(
   'title' => array('rules' => 
                        array
                        (
                        'alpha_numeric' => TRUE,
                        'min_length' => array('5', 'message' => 'Minimum lenght 5 symbols'),
                        'max_length' => array('10', 'message' => 'Maximum lenght 10 symbols')
                        ),'required' => TRUE		
                  	  ),
    'email' => array('rule' => 'valid_email', 'required' => TRUE, 'message' => 'Valid email is required')


);


//print_r($advanced_rules);

$validation = Crystal::validation($advanced_rules, $data);


if($validation->passed == TRUE)
{
    echo "No errors";
}
else
{
    print_r($validation->errors);
}

*/

//
//
//$utilities = MicroORM::utilities();


//$columns =  array
//(
//'id' => array('type' => 'INT','length' => 10, 'auto_increment' => TRUE, 'primary_key' => TRUE),
//'name' => array('type' => 'TEXT', 'length' => 10),
//'body' => array('type' => 'VARCHAR', 'length' => 128),
//'decimal' => array('type' => 'DECIMAL', 'format' => '10,2'),
//'enum' => array('type' => 'ENUM', 'format' => "'false','true'")
//);

//$columns = array
//(
//'title' => array('type' => 'TEXT', 'length' => '10')
//);

//$options = array('engine' => 'MyISAM');

//$utilities->add_columns('martin', $columns);

//$utilities->rename_table('framework_rename', 'framework');



//$db_options = array('default_charset' =>'utf8_bin', 'collation' => 'utf8_bin');



//$utilities->create_database('test');
//
//
//$columns =  array
//(
//'id' => array('type' => 'INT','length' => 10, 'auto_increment' => TRUE, 'primary_key' => TRUE),
//'title' => array('type' => 'TEXT', 'length' => 10),
//'content' => array('type' => 'VARCHAR', 'length' => 128),
//'language_id' => array('type' => 'INT', 'length' => '10')
//);
//
//$options = array('engine' => 'MyISAM');
//
//$utilities->create_table('test_table',$columns, $options);



//$db->create_database('test');

//CREATE DATABASE `martin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;



//$db_utils = MicroORM::db_utilities('development');
//$migrations = MicroORM::db_migrations();


//print_r($_SERVER);

//$test = new Test();



//	$result = $test->get('new_table')
//    ->columns(array('content'))
//	->where(array('language_id' => '1'))
//    ->orderby(array('table_id' => 'ASC'))
//    ->limit('0', '1')
//	->fetch_element();
//
//    print_r($result);




//    $data = array('title' => 'Updated title',
//                   'content' => "Lorem ipsumdfdf updated");


    // $update = $test->where(array('table_id'=> '6'))
    // ->update('new_table', $data);

    //$query = $test->where(array('language_id'=> '1'))
   // ->count('new_table');

    // print_r($query);



    //$insert = $test->insert('new_table', $data);


   //$test->print_query($query);
    //print_r($test->affected_rows());



