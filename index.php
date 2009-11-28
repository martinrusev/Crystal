<?php
header('Content-Type: text/html; charset=utf-8');
require('Crystal.php');


$data = array
(
'repeat_password' => 'test',
'email' => 'ajaxsabv.bg',
'title' => '7',
'age' => '19',
'newtitle' => 'a'
);

$rules = array
(
'newtitle' => array('rules' => 
							array
							(
							'required'
							)										
					)
);

$validation = Crystal::validation($rules, $data);


if($validation->passed == TRUE)
{
    echo "No errors";
}
else
{
    print_r($validation->errors);
}


