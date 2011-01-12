<?php
require_once('config.php');
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('show_passes.php');
$test = &new GroupTest('Crystal Query Builder test suite ');


//$test->addTestFile(CRYSTAL_BUILDER .'Select.php');
$test->addTestFile(CRYSTAL_BUILDER .'Where.php');
//$test->addTestFile(CRYSTAL_BUILDER .'Orderby.php');
//$test->addTestFile(CRYSTAL_BUILDER .'Groupby.php');

$test->run(new ShowPasses());