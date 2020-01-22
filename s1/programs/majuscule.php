<?php
if (count($argv) < 2){
    echo "Saisissez un argument.";
} elseif (count($argv) != 2) {
    echo "Saissisez un seul argument.";
} else {
    $sentence = $argv[1];

    $modifiedSentence = '';
    $numberOfChar = strlen($sentence);
    echo $numberOfChar . PHP_EOL;
    for($index = 0; $index < $numberOfChar; $index++) {
        if ($index % 2 == 1) {
            $modifiedSentence .= strtoupper($sentence[$index]);
        } else {
            $modifiedSentence .= strtolower($sentence[$index]);
        }
    }
    echo $modifiedSentence;
}
echo PHP_EOL . "END OF PROGRAMME.";