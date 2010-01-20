<?php 
require_once 'config.php';
require_once(SIMPLETEST_DIR  . 'unit_tester.php');
require_once('show_passes.php');
$test = &new GroupTest('Crystal test suite - Validation');


/* VALIDATION TESTS **/

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



$test->run(new ShowPasses());
