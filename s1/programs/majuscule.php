<?php
// check if an argument has been enter
if (count($argv) < 2){
    echo "Saisissez un argument.";
} elseif (count($argv) != 2) {
    echo "Saissisez un seul argument.";
} else {
    $sentence = $argv[1];
    $modifiedSentence = '';
    $numberOfChar = strlen($sentence);

    for($index = 0; $index < $numberOfChar; $index++) {
        if ($index % 2 == 1) {
            $modifiedSentence .= strtoupper($sentence[$index]);
        } else {
            $modifiedSentence .= strtolower($sentence[$index]);
        }
    }
    echo $modifiedSentence;
}