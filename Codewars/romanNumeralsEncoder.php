<?php

function solution(int $number)
{
    $numberArray = array_reverse(str_split($number));

    $roman_number = '';

    foreach ($numberArray as $key => $value) {
        $roman_number .= convertToRoman($key, $value);
    }

    return strrev($roman_number);
}

function convertToRoman(int $index, int $number)
{
    if ($index === 0) {
        $one = 'I';
        $five = 'V';
        $ten = 'X';
    } else if ($index === 1) {
        $one = 'X';
        $five = 'L';
        $ten = 'C';
    } else if ($index === 2) {
        $one = 'C';
        $five = 'D';
        $ten = 'M';
    } else if ($index === 3) {
        $one = 'M';
    }

    $roman_number = '';

    if ($number <= 3) {
        for (; $number > 0; $number--) {
            $roman_number .= $one;
        }
    } else if ($number == 4) {
        $roman_number .= $one . $five;
    } else if ($number == 5) {
        $roman_number .= $five;
    } else if ($number > 5 && $number < 9) {
        $roman_number .= $five;
        for (; $number > 5; $number--) {
            $roman_number .= $one;
        }
    } else if ($number == 9) {
        $roman_number .= $one . $ten;
    } else if ($number == 10) {
        $roman_number .= $ten;
    }

    return strrev($roman_number);
}

// BETTER SOLUTION BELOW

function betterSolution(int $number)
{
    $result = '';

    $romanNumerals = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    foreach ($romanNumerals as $roman => $value) {
        $matches = intval($number / $value);
        $result .= str_repeat($roman, $matches);
        $number = $number % $value;
    }

    return $result;
}

var_dump(solution(1000));
var_dump(solution(4));
var_dump(solution(1));
var_dump(solution(1990));
var_dump(solution(2008));

var_dump(betterSolution(1000));
var_dump(betterSolution(4));
var_dump(betterSolution(1));
var_dump(betterSolution(1990));
var_dump(betterSolution(2008));
