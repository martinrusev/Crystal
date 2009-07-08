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
class DB_Utilities
{


    function __construct($connection=null, $log=null)
    {

        $this->db = Connection_Manager::establish_db_connection();
        $this->log_enabled = $log;
        
    }

    function create_table($table, $columns, $options = null)
    {
        $sql = "CREATE TABLE `" . $table . '` (';


        foreach($columns as $key => $value)
        {
            $fields[] = '`' . $key . '` ' . $this->_process_fields($value);
 
        }

        $sql .= implode(',', $fields);

        $sql .= ')';

        if(isset($options))
        {
            $sql .= $this->_process_options($options);
        }
        else
        {
            
        }

        $query = $this->_execute_query($sql);

    }



    private function _process_options($options)
    {


        if(array_key_exists('engine', $options))
        {

            $sql = "ENGINE " . $options['engine'];

        }


        if(array_key_exists('charset', $options))
        {

            $sql .= "CHARACTER SET " . $options['charset'];

        }

         if(array_key_exists('default_charset', $options))
        {

            $sql .= "DEFAULT CHARACTER SET " . $options['charset'];

        }



        if(array_key_exists('collation', $options))
        {

            $sql .=  "COLLATE " .  $options['collation'];

        }


        return $sql;



    }

  


    private function _process_fields($fields)
    {

        /** TRAVERSE FIELDS ARRAY **/
        if(array_key_exists('type', $fields))
        {

            $sql = $fields['type'];

        }


        if(array_key_exists('length', $fields))
        {

            $sql .= '(' . $fields['length'] . ')';

        }



        if(array_key_exists('format', $fields))
        {

            $sql .= '(' . $fields['format'] . ')';

        }


        if(array_key_exists('null', $fields))
        {

            $sql .= "NULL";

        }
        else
        {
            $sql .= " NOT NULL";
        }


        if(array_key_exists('auto_increment', $fields))
        {

            $sql .= " AUTO_INCREMENT";
      
        }


        if(array_key_exists('primary_key', $fields))
        {

            $sql .= " PRIMARY KEY";

        }



        return $sql;

        
    }




   

    function create_database($database_name, $options=null)
    {
        
    }


    function drop_database($database_name)
    {
        
        $sql = "DROP DATABASE" .  $database_name;

        $query = $this->_execute_query($sql);
    
    }


    function drop_table($table)
    {
        $sql = "DROP TABLE" .  $table;

        $query = $this->_execute_query($sql);

    }


    function empty_table($table)
    {
        
        $sql = "TRUNCATE TABLE" .  $table;

        $query = $this->_execute_query($sql);
        
    }

    function optimize_table($table)
    {
        
    }


    function rename_table($table_name, $new_name)
    {

        $sql = "ALTER TABLE `" . $table_name . "` RENAME TO `" . $new_name ."`";

        $query = $this->_execute_query($sql);
        
    }

    function add_columns($table, $columns_array)
    {
        $sql = "ALTER TABLE `". $table . "` ADD";

     
        if(isset($columns_array))
        {

            foreach($columns_array as $key => $value)
            {
            $fields[] = '`' . $key . '` ' . $this->_process_fields($value);
            }

            $sql .= implode(',', $fields);

           
        }

        $query = $this->_execute_query($sql);
        
    }

    function change_column($table, $column_options)
    {

       $sql = "ALTER TABLE `". $table . "` CHANGE";

//ALTER TABLE `martin` CHANGE `title` `title_big` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL 
        
    }


    function delete_column($table, $column)
    {

        
    }


    function _execute_query($query)
    {

       $execute_query = mysql_query($query, $this->db);


       if($this->log_enabled == TRUE && $execute_query == TRUE)
        {

            Log_Writer::write_query($query);

        }

       return $execute_query;
 
                
    }
}
