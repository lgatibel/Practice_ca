<?php
// check if an argument is present 
if (empty($argv)){
    echo "Saisissez un argument.";
// test if the argument is a number superior to 0 
} elseif ((int)$argv[1] === 0) {
    echo "Saisissez un Nombre entier superieur à 0.";
} else {
    // initialise variable with argument
    $numberOfChar = (int)$argv[1];
    // initialise pad char
    $char = '#';

    // construct the string with spaces and the special char
    for ($length = $numberOfChar -1; $length >= 0; $length--){
        // add the spaces before the special characteres
        $line = str_pad('', $length, " ", STR_PAD_LEFT);
        // add the special characters
        $line .= str_pad('', $numberOfChar - $length, "#", STR_PAD_RIGHT);
        $line .= PHP_EOL;
        // print each line of result
        echo "$line";
    }
}
