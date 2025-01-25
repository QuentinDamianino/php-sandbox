<?php

function solution(int $number): int
{
    if ($number < 0) return 0;

    $sum = 0;

    $number--;
    for (; $number > 0; $number--) {
        if ($number % 3 === 0 || $number % 5 === 0) {
            $sum += $number;
        }
    }

    return $sum;
}

var_dump(solution(10));
