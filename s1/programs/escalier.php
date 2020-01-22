<?php
if (empty($argv)){
    echo "Saisissez un argument.";
} elseif ((int)$argv[0]) {
    echo "Saisissez un Nombre entier.";
} else {
    $numberOfChar = (int)$argv[1];
    $char = '#';

    for ($length = $numberOfChar -1; $length >= 0; $length--){
        $line = str_pad('', $length, " ", STR_PAD_LEFT);
        $line .= str_pad('', $numberOfChar - $length, "#", STR_PAD_RIGHT);
        $line .= PHP_EOL;
        echo "$line";
    }
    echo PHP_EOL . "END OF PROGRAMME.";
}
