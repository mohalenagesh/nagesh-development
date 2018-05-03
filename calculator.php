<?php

include './CalculatorModel.php';
//from terminal : php calculator.php add 10,13
//php calculator.php multiply 10,5

$action = $params = '';
if (isset($argv[1]) != '') {
    $action = trim($argv[1]);
}
if (isset($argv[2]) != '') {
    $params = trim($argv[2]);
}

$modelCalculte = new CalculatorModel();
$modelCalculte->calculateAction($action, $params);
?>