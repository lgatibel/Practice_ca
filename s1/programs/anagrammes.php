<?php

// function for error display
function displayError(string $message) {
    echo $message;
    exit;
}

function is_an_anagram($reference, $challenger) {

    // get the lenght of the two words
    $referenceLength = strlen($reference);
    $challengerLength = strlen($challenger);

    // check if the lenght of the two string os equal
    if ($referenceLength != $challengerLength){
        return false;
    }
    // Transform the string to an array of characters
    $referenceWord = str_split($reference);

    // Iterate to each letter to see if they are in both words
    foreach($referenceWord as $key => $letter) {
        if (substr_count($reference, $letter) !=
         substr_count($challenger, $letter)) {
            return false;
        }
    }
    return true;
}

// get the argument
if (count($argv) !=3){
    displayError("This Program only take two argument the first one is a string (reference word) and the second one is a file name.");
}
$referenceWord = $argv[1];
$fileName = $argv[2];

// check if the first argument is present
if (empty($referenceWord)) {
    displayError("You have to pass at least one word as first argument.");
// check if the second argument is present
} elseif (empty($fileName)) {
    displayError("You have to pass at least one file name as second argument.");
} else {
    // check if the file exist
    if (!file_exists($fileName)){
        displayError("This file do not exist please provide a good file name.");
    }

    // get the content of the file
    $file = file_get_contents($fileName);
    // $file = file_get_contents('test.txt');

    // check if the content has been read
    if ($file === null){
        displayError("Could not open this file check the rights of your file");
    }

    // transform the string to an array each word is separated by a '\n'
    $words = explode(PHP_EOL, $file);
    $result = '';
    $resultLength = 0;
    // check each word to see if its an anagram or not
    foreach($words as $word){
        if (is_an_anagram($referenceWord, $word)){
            $resultLength = strlen($result);
            // add the word to the string
            if (!$resultLength){
                $result = "[";
            } else {
                $result .= ", ";
            }
            $result .= "\"$word\"";
        }
    }
    if ($resultLength){
        $result .= "]";
    }
    //print result
    echo $result;
}