<?php

// recursive function
function factorielle(int $number, $index){
    $index--;
    $number *= $index;

    if ($index <= 1){
        return $number;
    }
    return factorielle($number, $index);
}

$argument = (int)$argv[1];
// check if an argument is present 
if (empty($argument)) {
    echo "Saisissez un argument.";
} elseif ($argument === 0) {
    echo "Saisissez un Nombre entier superieur à 0.";
} else {
    if ($argument == 1){
        echo $argument;
    // Specifique case for result that is bigger than int size
    } elseif ($argument > 20) {
        echo "This result is superior to Int size try a number equal or lower than 20";
    } else {
        echo factorielle($argument, $argument);
    }
}
