<?php
// check if an argument has been enter
if (count($argv) < 2){
    echo "Saisissez un argument.";
// check if the number of args is equal to two
} elseif (count($argv) != 2) {
    echo "Saissisez un seul argument.";
} else {
    // initialise sentence with the argument
    $sentence = $argv[1];

    $modifiedSentence = '';
    $numberOfChar = strlen($sentence);
    for($index = 0; $index < $numberOfChar; $index++) {
        // Transform even char to Uppercase
        if ($index % 2 == 1) {
            $modifiedSentence .= strtoupper($sentence[$index]);
        // Transform odd char to lowercase
        } else {
            $modifiedSentence .= strtolower($sentence[$index]);
        }
    }
    //print result sentence
    echo $modifiedSentence;
}