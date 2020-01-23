<?php
// check if an argument is present 
if (empty($argv)){
    echo "Saisissez un argument.";
} elseif ((int)$argv[1] === 0) {
    echo "Saisissez un Nombre entier superieur à 0.";
} else {
    $numberOfChar = (int)$argv[1];
    $char = '#';

    // construct the string with spaces and the special char
    for ($length = $numberOfChar -1; $length >= 0; $length--){
        $line = str_pad('', $length, " ", STR_PAD_LEFT);
        $line .= str_pad('', $numberOfChar - $length, "#", STR_PAD_RIGHT);
        $line .= PHP_EOL;
        echo "$line";
    }
}
