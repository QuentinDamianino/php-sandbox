<?php

function isIsogram(string $word): bool
{
    $letters = str_split(strtolower($word));

    return array_unique($letters) === $letters;
}

var_dump(isIsogram('moose'));