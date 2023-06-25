<?php

function countBits(int $n): int
{
    return array_sum(str_split(decbin($n)));
}

var_dump(countBits(10));