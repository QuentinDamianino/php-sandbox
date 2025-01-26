<?php

function is_solved(array $board): int
{
    $winningConfigurations = [
        ['0,0', '0,1', '0,2'],
        ['1,0', '1,1', '1,2'],
        ['2,0', '2,1', '2,2'],
        ['0,0', '1,0', '2,0'],
        ['0,1', '1,1', '2,1'],
        ['0,2', '1,2', '2,2'],
        ['0,0', '1,1', '2,2'],
        ['0,2', '1,1', '2,0'],
    ];

    foreach ($winningConfigurations as $configuration) {
        [$x, $y] = explode(',', $configuration[0]);
        [$x2, $y2] = explode(',', $configuration[1]);
        [$x3, $y3] = explode(',', $configuration[2]);

        if ($board[$x][$y] === $board[$x2][$y2] && $board[$x2][$y2] === $board[$x3][$y3]) {
            if ($board[$x][$y] === 0) return -1;
            return $board[$x][$y];
        }
    }

    foreach ($board as $row) {
        foreach ($row as $element) {
            if ($element === 0) return -1;
        }
    }

    return 0;
}

# BETER SOLUTION BELOW

function betterSolution(array $board): int
{
    $hasEmpty = false;

    for ($i = 0; $i < 3; $i++) {
        if ($board[$i][0] === $board[$i][1] && $board[$i][1] === $board[$i][2]) {
            if ($board[$i][0] !== 0) return $board[$i][0];
        }
        if ($board[$i][0] === 0 || $board[$i][1] === 0 || $board[$i][2] === 0) {
            $hasEmpty = true;
        }
    }

    for ($j = 0; $j < 3; $j++) {
        if ($board[0][$j] === $board[1][$j] && $board[1][$j] === $board[2][$j]) {
            if ($board[0][$j] !== 0) return $board[0][$j];
        }
    }

    if ($board[0][0] === $board[1][1] && $board[1][1] === $board[2][2]) {
        if ($board[0][0] !== 0) return $board[0][0];
    }

    if ($board[0][2] === $board[1][1] && $board[1][1] === $board[2][0]) {
        if ($board[0][2] !== 0) return $board[0][2];
    }

    return $hasEmpty ? -1 : 0;
}

var_dump(is_solved([
    [1, 2, 1],
    [2, 1, 2],
    [1, 2, 1]
]));
var_dump(betterSolution([
    [2, 1, 2],
    [2, 1, 2],
    [1, 2, 1]
]));
