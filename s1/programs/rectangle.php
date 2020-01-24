<?php 

function isValidrectangle(array $rectangle){
    $numberOfLine = count($rectangle);
    $lines = $rectangle;
    $referenceLength = strlen($rectangle[0]);

    // check if each line have the same length
    foreach($lines as $line){
        if (strlen($line) !== $referenceLength){
            return false;
        }
    }
    return $numberOfLine != $referenceLength;
}

function isValidSquare(array $rectangle){
    $numberOfLine = count($rectangle);
    $lines = $rectangle;

    // check if each line have the same length
    foreach($lines as $line){
        if (strlen($line) !== $numberOfLine){
            return false;
        }
    }
    return true;
}

if (count($argv) < 3) {
    echo "Ce programme prend deux nom de fichier en entree.";
    exit;
} 

$squareName = $argv[1];
$rectangleName = $argv[2];

if (!file_exists($squareName)){
    throw new Error("The file $squareName do not exist.");
} elseif (!file_exists($rectangleName)){
    throw new Error("The file $rectangleName do not exist.");
}

$square = file_get_contents($squareName);
$rectangle = file_get_contents($rectangleName);

if (!$square){
    throw new Error("The file $square has no content or is not readable");    
} elseif (!$rectangle){
    throw new Error("The file $rectangle has no content or is not readable");    
}

$square = explode(PHP_EOL, $square);
$rectangle = explode(PHP_EOL, $rectangle);

if (!isValidSquare($square)){
    throw new Error("The file $squareName is not a valid square");
} elseif (!isValidrectangle($rectangle)){
    throw new Error("The file $rectangleName is not a valid rectangle");
}

$squareLinesLength = strlen($square[0]);
$recatngleLinesLength = strlen($rectangle[0]);

if ($squareLinesLength > $recatngleLinesLength){
    throw new Error("The file $squareName cannot be contain in file $rectangleName");
}



function is_a_match(array $rectangle, array $square, int $rectangleIndex, int $firsMatchIndex){
    $indexSquare = 0;
    // check if the sqaure match into the rectangle
    for($indexCheck = $rectangleIndex; $indexCheck < $rectangleIndex + 3; $indexCheck++) {
        if ($indexCheck > count($rectangle) || $indexSquare > count($square) ||
            stripos($rectangle[$indexCheck], $square[$indexSquare]) != $firsMatchIndex){
            return false;
        } 
        $indexSquare++;
    }
    return true;
}

foreach ($rectangle as $rectangleIndex => $line){
    // get the first position of the first line match in the rectangle
    $firsMatchIndex = stripos($line, $square[0]);
    if ($firsMatchIndex != false && is_a_match($rectangle, $square, $rectangleIndex, $firsMatchIndex)) {
       echo "$firsMatchIndex, $rectangleIndex";
       exit;
    }

}
