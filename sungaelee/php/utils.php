<?php

/*
    Strips tags from the provided $string and truncates $string to the given
    number of $words
*/
function trim_words($string, $words) {
    $string = strip_tags($string);
    return wp_trim_words($string, $words, '...');
}

?>