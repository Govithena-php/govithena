<?php


function genarateListOfMonthNamesFromToday()
{
    $currentMonth = date('m');
    $currentYear = date('Y');

    $monthsArray = array();

    for ($i = 10; $i >= 1; $i--) {
        $month = date('F', mktime(0, 0, 0, $currentMonth - $i, 1, $currentYear));
        $monthsArray[] = $month;
    }
    $currentMonthName = date('F');
    $monthsArray[] = $currentMonthName;

    // $nextMonth = date('F', mktime(0, 0, 0, $currentMonth + 1, 1, $currentYear));
    // $monthsArray[] = $nextMonth;

    for ($i = 1; $i <= 2; $i++) {
        $month = date('F', mktime(0, 0, 0, $currentMonth + $i, 1, $currentYear));
        $monthsArray[] = $month;
    }

    return $monthsArray;
}
