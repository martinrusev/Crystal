<?php
require_once 'config.php';
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('show_passes.php');
$test = &new GroupTest('Crystal Connection test suite');


/** Configuration METHODS **/
$test->addTestFile(CRYSTAL_CONNECTION_TESTS .'Configuration.php');

$test->run(new ShowPasses());