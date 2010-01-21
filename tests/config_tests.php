<?php
require_once 'config.php';
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('show_passes.php');
$test = &new GroupTest('Crystal Connection test suite');


/** VALIDATION TESTS **/
/*
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Alpha.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'AlphaNumeric.php');

*/

/** MySQL METHODS **/
$test->addTestFile(CRYSTAL_CONNECTION_TESTS .'Configuration.php');

$test->run(new ShowPasses());