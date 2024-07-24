<?php
// File: app/Helpers/text_helper.php
if (! function_exists('truncate_words')) {
    function truncate_words($text, $limit) {
        $words = explode(" ", $text);
        if (count($words) > $limit) {
            return implode(" ", array_slice($words, 0, $limit)) . " ...";
        } else {
            return $text;
        }
    }
}