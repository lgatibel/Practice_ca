<?php

// recursive function
function factorielle(float $number, float $index){
    $index--;
    $number *= $index;

    if ($index <= 1){
        return $number;
    }
    return factorielle($number, $index);
}

$argument = (float)$argv[1];
// check if an argument is present 
if (empty($argument)) {
    echo "Saisissez un argument.";
} elseif ($argument === 0) {
    echo "Saisissez un Nombre entier superieur à 0.";
} else {
    if ($argument == 1){
        echo $argument;
    } else {
        echo number_format((float)factorielle($argument, $argument));
    }
}
