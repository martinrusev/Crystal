<?php
$temp_dir  = explode(DIRECTORY_SEPARATOR , dirname(__FILE__));
array_pop($temp_dir);
$crystal_dir = implode(DIRECTORY_SEPARATOR, $temp_dir);

/** DEFINE DIRECTORY CONSTANTS **/
define('CRYSTAL_ROOT_DIR', $crystal_dir . DIRECTORY_SEPARATOR . 'Crystal' . DIRECTORY_SEPARATOR);
define('SIMPLETEST_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'simpletest' . DIRECTORY_SEPARATOR);
define('CRYSTAL_VALIDATION_TESTS', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Validation' . DIRECTORY_SEPARATOR);
define('CRYSTAL_MYSQL_TESTS', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'QueryBuilders' . DIRECTORY_SEPARATOR . 'MySQL' . DIRECTORY_SEPARATOR);
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('show_passes.php');
$test = &new GroupTest('Crystal test suite');


/** VALIDATION TESTS **/
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Alpha.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'AlphaNumeric.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Between.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Boolean.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Comparsion.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Email.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Extension.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Integer.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Ip.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Matches.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'MaxLength.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'MinLength.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Numeric.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Regexp.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Required.php');
$test->addTestFile(CRYSTAL_VALIDATION_TESTS .'Url.php');

/** MySQL METHODS **/
$test->addTestFile(CRYSTAL_MYSQL_TESTS .'Select.php');

$test->run(new ShowPasses());