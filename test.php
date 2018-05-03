<?php

//from terminal : php calculator.php add 10,13
//php calculator.php multiply 10,5

$action = '';
if (isset($argv[1]) != '') {
    $action = trim($argv[1]);
}
$params = '';
if (isset($argv[2]) != '') {
    $params = trim($argv[2]);
}
$result = 0;
$output_array = array();

switch ($action) {

    case 'add':

        if ($params != '') {
            if (preg_match_all("/-[0-9]+/i", $params, $result_array)) {
                if (is_array($result_array) && isset($result_array[0])) {
                    $output_array = $result_array[0];
                    $result = "Error: Negative numbers (" . implode(',', $output_array) . ") not allowed";
                }
            } else {
                preg_match_all("/[0-9]+/i", $params, $result_array);
                if (is_array($result_array) && isset($result_array[0])) {
                    $output_array = array_filter($result_array[0], "ignoreNumbersAboveThousand");
                    $result = array_sum($output_array);
                }
            }
        }
        echo $result;
        break;

    case 'multiply':

        if ($params != '') {
            if (preg_match_all("/-[0-9]+/i", $params, $result_array)) {
                if (is_array($result_array) && isset($result_array[0])) {
                    $output_array = $result_array[0];
                    $result = "Error: Negative numbers (" . implode(',', $output_array) . ") not allowed";
                }
            } else {
                preg_match_all("/[0-9]+/i", $params, $result_array);
                if (is_array($result_array) && isset($result_array[0])) {
                    $output_array = array_filter($result_array[0], "ignoreNumbersAboveThousand");
                    $result = array_product($output_array);
                }
            }
        }
        echo $result;
        break;
    default:
        echo 'No action passed';
}

function ignoreNumbersAboveThousand($var) {
    return($var <= 1000);
}

?>