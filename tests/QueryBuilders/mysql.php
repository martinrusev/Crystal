<?php
require_once('../config.php');
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('../show_passes.php');
$test = &new GroupTest('Crystal Query Builder test suite - MySQL Version');


//  MySQL METHODS
$test->addTestFile(CRYSTAL_MYSQL_TESTS .'Select.php');
$test->addTestFile(CRYSTAL_MYSQL_TESTS .'Where.php');
$test->addTestFile(CRYSTAL_MYSQL_TESTS .'Orderby.php');

$test->run(new ShowPasses());