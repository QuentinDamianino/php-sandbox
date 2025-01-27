<?php

function sqInRect($lng, $wdth)
{
    if ($lng === $wdth) return null;

    $result = [];

    do {
        if ($lng > $wdth) {
            $number = (int)($lng / $wdth);
            $rest = $lng % ($number * $wdth);

            while ($number > 0) {
                $result[] += $wdth;
                $lng -= $wdth;
                $number--;
            }
        } else {
            $number = (int)($wdth / $lng);
            $rest = $wdth % ($lng * $number);

            while ($number > 0) {
                $result[] += $lng;
                $wdth -= $lng;
                $number--;
            }
        }
    } while ($rest > 0);


    return $result;
}

var_dump(sqInRect(5, 3));
