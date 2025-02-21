<?php

function moveZeros(array $items): array
{
    $originalLength = count($items);

    $items = array_values(array_filter($items, function ($e) {
        return ($e !== 0 && $e !== 0.0);
    }));

    $zeros = array_fill(0, $originalLength - count($items), 0);

    return array_merge($items, $zeros);
}

function betterSolution(array $items): array
{
    return array_pad(array_filter($items, function ($x) {
        return $x !== 0 && $x !== 0.0;
    }), count($items), 0);
}

var_dump(moveZeros([1, 2, 0, 1, 0, 1, 0, 3, 0, 1]));
var_dump(moveZeros([9, 0.0, 0, 9, 1, 2, 0, 1, 0, 1, 0.0, 3, 0, 1, 9, 0, 0, 0, 0, 9]));
var_dump(moveZeros(["a", 0, 0, "b", null, "c", "d", 0, 1, false, 0, 1, 0, 3, [], 0, 1, 9, 0, 0, 0, 0, 9]));
var_dump(betterSolution([1, 2, 0, 1, 0, 1, 0, 3, 0, 1]));
var_dump(betterSolution([9, 0.0, 0, 9, 1, 2, 0, 1, 0, 1, 0.0, 3, 0, 1, 9, 0, 0, 0, 0, 9]));
var_dump(betterSolution(["a", 0, 0, "b", null, "c", "d", 0, 1, false, 0, 1, 0, 3, [], 0, 1, 9, 0, 0, 0, 0, 9]));
