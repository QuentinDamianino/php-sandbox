<?php

function disemvowel(string $comment): string {
    $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];

    return str_replace($vowels, '', $comment);
}

$comment = "No offense but,\nYour writing is among the worst I've ever read";

echo disemvowel($comment);