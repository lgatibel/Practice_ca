<?php

// get all arguments exepted the first one (name of the program) 
$arguments = array_slice($argv, 1);

// check if an argument is present 
if (count($arguments) < 1) {
    echo "Saisissez un argument.";
// test if the argument is a number superior to 0 
} else {
    // tri function, array $argument will be automaticaly change by the function
    rsort($arguments, SORT_NUMERIC);
    // iterate throught array to print each element
    // $key is the index of the table
    foreach ($arguments as $key => $result) {
        // add space beetween print
        if ($key > 0) {
            echo " ";
        }
        // print an element of the array
        echo $result;
    }
}