<?php
   require 'Crystal.php';
   $db = Crystal::db();
   
   $data = array('content' => '<h1>"Test" i tuk oshte nqkakvi loshi kavicki ""</h1>');
   
   
   $db->insert('martin1', $data)->execute();
   
   //print_r($db->get('martin1')->fetch_all());
   
?>