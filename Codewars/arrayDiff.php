<?php

// There is already a function called array_diif() doing it.

function arrayDiff(array $array, array $subtract): array
{
    foreach ($array as $key => $element) {
        foreach ($subtract as $s) {
            if ($element === $s) {
                unset($array[$key]);
            }
        }
    }

    return array_values($array);
}

var_dump(arrayDiff([1,2,2,2,3],[2]));
