<?php

// recursive function
function factorielle(int $number, $index){
    // $equivalent to $index = $index - 1;
    $index--;
    // equivalent to $number = $number * index;
    $number *= $index;
    // exit condition of the recursion
    if ($index <= 1){
        return $number;
    }
    // return the function factorielle
    return factorielle($number, $index);
}

$argument = (int)$argv[1];
// check if an argument is present 
if (empty($argument)) {
    echo "Saisissez un argument.";
// test if the argument is a number superior to 0 
} elseif ($argument === 0) {
    echo "Saisissez un Nombre entier superieur à 0.";
} else {
    // specifique case for argument 1
    if ($argument == 1){
        echo $argument;
    // Specifique case for result that is bigger than int size
    } elseif ($argument > 20) {
        echo "This result is superior to Int size try a number equal or lower than 20";
    } else {
    // default case
        echo factorielle($argument, $argument);
    }
}
