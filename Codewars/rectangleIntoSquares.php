<?php

function sqInRect($lng, $wdth)
{
    if ($lng === $wdth) return null;

    $result = [];

    do {
        if ($lng > $wdth) {
            $result[] += $wdth;
            $lng -= $wdth;
        } else {
            $result[] += $lng;
            $wdth -= $lng;
        }
    } while ($wdth > 0 && $lng > 0);


    return $result;
}

var_dump(sqInRect(5, 3));
