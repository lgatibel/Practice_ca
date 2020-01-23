<?php

$arguments = array_slice($argv, 1);

// check if an argument is present 
if (count($arguments) < 1) {
    echo "Saisissez un argument.";
} else {
    rsort($arguments, SORT_NUMERIC);

    foreach ($arguments as $key => $result) {
        // add space beetween print
        if ($key > 0) {
            echo " ";
        }
        echo $result;
    }
}