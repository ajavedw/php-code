<?php
/*//console app*/
$row;
$row[ 0 ] = array("fin_year" => 2018, "fin_month" => 5, "spent" => 125.00, "cal_year" => 2017, "cal_month" => 11);
$row[ 1 ] = array("fin_year" => 2018, "fin_month" => 7, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 1);
$row[ 2 ] = array("fin_year" => 2018, "fin_month" => 8, "spent" => 300.00, "cal_year" => 2018, "cal_month" => 2);
$row[ 3 ] = array("fin_year" => 2018, "fin_month" => 10, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 4);
$row[ 4 ] = array("fin_year" => 2018, "fin_month" => 12, "spent" => 200.00, "cal_year" => 2018, "cal_month" => 6);
$row[ 5 ] = array("fin_year" => 2019, "fin_month" => 2, "spent" => 725.00, "cal_year" => 2018, "cal_month" => 8);
$row[ 6 ] = array("fin_year" => 2019, "fin_month" => 3, "spent" => 210.00, "cal_year" => 2018, "cal_month" => 9);
$row[ 7 ] = array("fin_year" => 2019, "fin_month" => 4, "spent" => 330.00, "cal_year" => 2018, "cal_month" => 10);
$row[ 8 ] = array("fin_year" => 2019, "fin_month" => 8, "spent" => 230.00, "cal_year" => 2019, "cal_month" => 4);
$row[ 9 ] = array("fin_year" => 2019, "fin_month" => 10, "spent" => 333.00, "cal_year" => 2019, "cal_month" => 4);


foreach ($row as $array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

/*$row = array(); // YOUR ARRAY FROM DATABASE*/

$start_year = 2017;
$last_year = 2021;

// loops through every year between $start_year and $last_year
for ($current_year = $start_year; $current_year <= $last_year; $current_year++) {
    // loops through every month between 1 and 12
    for ($current_month = 1; $current_month <= 12; $current_month++) {
        // loops through every item of your array
        $found = false;
        foreach ($row as $value) {
            /**** Loop through all rows and see if there is a match. If there is, break and exit.
             * if there is no match found for year and month, after looping through all array rows
             * the FOREACH will finch and control will move over to IF(!FOUND) ****/
            if ($value[ 'cal_year' ] == $current_year && $value[ 'cal_month' ] == $current_month) {
                $found = true;
                break;
            }
        }
        //if no match has been found loop through all

        if (!$found) {
            if (($current_month >= 1 && $current_month <= 6)) {
                $fin_month = $current_month + 6;
                $cal_month = $current_month;
                $fin_year = $current_year + 1;
                $cal_year = $current_year;
                $spent = 0;
                $row[] = array('fin_year' => $fin_year, 'fin_month' => $fin_month, 'spent' => $spent, 'cal_year' => $cal_year, 'cal_month' => $cal_month);
                $found = true;
            }

            if ($current_month >= 7 && $current_month <= 12) {
                $fin_month = $current_month - 6;
                $cal_month = $current_month;
                $fin_year = $current_year;
                $cal_year = $current_year;
                $spent = 0;
                $row[] = array('fin_year' => $fin_year, 'fin_month' => $fin_month, 'spent' => $spent, 'cal_year' => $cal_year, 'cal_month' => $cal_month);
                $found = true;
            }
        }
    }
}

// function to sort the array by fin_year and if equal by fin_month
function special_sort($a, $b)
{
    $retval = ($a[ 'cal_year' ] == $b[ 'cal_year' ] ? 0 : ($a[ 'cal_year' ] > $b[ 'cal_year' ] ? 1 : -1));
    if ($retval == 0) {
        $retval = ($a[ 'cal_month' ] == $b[ 'cal_month' ] ? 0 : ($a[ 'cal_month' ] > $b[ 'cal_month' ] ? 1 : -1));
    }
    return $retval;
}

usort($row, 'special_sort');

echo "<pre>";
print_r($row);
echo "</pre>";
