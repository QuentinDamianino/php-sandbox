<?php

function score($dice)
{
    $combosPointsTable = [
        1 => 1000,
        2 => 200,
        3 => 300,
        4 => 400,
        5 => 500,
        6 => 600,
    ];

    $occurrencesMap = array_count_values($dice);

    $result = 0;

    foreach ($occurrencesMap as $value => $occurrences) {
        if ($occurrences < 3 && $value !== 1 && $value !== 5) continue;
        if ($occurrences < 3 && $value === 1 || $value === 5) $result += ($occurrences * ($combosPointsTable[$value] / 10));
        if ($occurrences === 3) $result += $combosPointsTable[$value];
        if ($occurrences === 6) $result += (2 * $combosPointsTable[$value]);
        if ($occurrences > 3 && $occurrences < 6 && ($value === 1 || $value === 5)) $result += ($combosPointsTable[$value] + (($occurrences - 3) * ($combosPointsTable[$value] / 10)));
    }

    return $result;
}

var_dump(score([2, 3, 4, 6, 2]));
var_dump(score([4, 4, 4, 3, 3]));
var_dump(score([2, 4, 4, 5, 4]));
var_dump(score([5, 1, 3, 4, 1]));
var_dump(score([1, 1, 1, 3, 1]));
