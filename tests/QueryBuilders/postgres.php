<?php
require_once('../config.php');
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('../show_passes.php');
$test = &new GroupTest('Crystal Query Builder test suite - PostgreSQL Version');


//  PostgreSQL METHODS
$test->addTestFile(CRYSTAL_POSTGRE_TESTS .'Select.php');
$test->addTestFile(CRYSTAL_POSTGRE_TESTS .'Where.php');

$test->run(new ShowPasses());