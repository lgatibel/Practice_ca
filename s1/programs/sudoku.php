<?php

Class Grid {
    private const MAKE_NEXT_MOVE = 0;
    private const CANCEL_PREVIOUS_MOVE = 0;
    private const EMPTY_BOX = '_';
    private const LINE_SEPARATOR = '|';
    private const COLUM_SEPARATOR = '---+---+---';
    private const VALID_ELEMENT = ['1', '2', '3', '4', '5', '6', '7', '8', '9'];
    private $lines = [];
    private $columns = [];
    private $squares = [];
    private $grid = [];
    private $gridArray = [];
    private $emptyBoxes = [];
    private $movesList = [];
    private $indexEmptyBox = 0;

    public function __construct(array $gridArray){
        $this->gridArray = $gridArray;
        $this->setLines();
        $this->setGrid();
        $this->setColumns();
        $this->setSquares();
        $this->setEmptyBoxes();
    }

    public function __getEmptyBoxes(){
        return $this->emptyBoxes;
    }

    public function __getLines(){
        $this->setLines();
        return $this->lines;
    }

    public function __getColumns(){
        $this->setColumns();
        return $this->columns;
    }

    private function setIndexToNextEmptyBox(): void
    {
        if ($this->indexEmptyBox === count($this->emptyBoxes)){
            throw new Error("This is no Empty boxes Left");
        }
        $this->indexEmptyBox++;
    }

    private function setIndexToPreviousEmptyBox(): void
    {
        if ($this->indexEmptyBox === 0){
            throw new Error("This is already the first empty box of the grid");
        }
        $this->indexEmptyBox--;
    }

    private function setLines(): void
    {
        $this->lines = [];
        foreach ($this->gridArray as $line) {
            if ($line != Grid::COLUM_SEPARATOR){
                $this->lines[] = str_replace(GRID::LINE_SEPARATOR, '', $line);
            }
        }
    }


    private function setGrid(): void
    {
        foreach ($this->__getLines() as $line){
            $this->grid[] = str_split($line);
        }
    }

    private function setColumns(): void
    {
        foreach ($this->__getLines() as $lineIndex => $line){
            $lineTab = str_split($line);
            foreach($lineTab as $elementIndex => $element) {
                if (!isset($this->columns[$elementIndex])){
                    $this->columns[$elementIndex] = '';
                }
                $this->columns[$elementIndex] .= $element;
            }
        }
    }


    private function setSquare(int $indexSquare): void
    {
        $startLine = 0;
        $startColumn = 0;

        switch ($indexSquare){
            case 0:
                $startLine = 0;
                $startColumn = 0;
            break;
            case 1:
                $startLine = 0;
                $startColumn = 3;
            break;
            case 2:
                $startLine = 0;
                $startColumn = 6;
            break;
            case 3:
                $startLine = 3;
                $startColumn = 0;
            break;
            case 4:
                $startLine = 3;
                $startColumn = 3;
            break;
            case 5:
                $startLine = 3;
                $startColumn = 6;
            break;
            case 6:
                $startLine = 6;
                $startColumn = 0;
            break;
            case 7:
                $startLine = 6;
                $startColumn = 3;
            break;
            case 8:
                $startLine = 6;
                $startColumn = 6;
            break;
            default:
                throw new Error("An error Occured when we tried to gather the square values.");
        }

        
        for ($lineIndex = $startLine; $lineIndex < $startLine + 3 ;$lineIndex++){
            for ($columIndex = $startColumn; $columIndex < $startColumn + 3 ;$columIndex++){
                $this->square[] = $this->__getLines()[$lineIndex][$columIndex];
            }
        }
    }

    private function setSquares(): void
    {
        for($indexSquare = 0; $indexSquare < 9; $indexSquare++){
            $this->squares[$indexSquare] = $this->setSquare($indexSquare);
        }
    }

    private function setEmptyBoxes(): void
    {
        foreach($this->__getLines() as $lineIndex => $line){
            $emptyBoxIndex = 0;
            while ($emptyBoxIndex < 8 && $emptyBoxIndex !== false) {
                $emptyBoxIndex = stripos($line, GRID::EMPTY_BOX, $emptyBoxIndex + 1);
                if ($emptyBoxIndex != false) {
                    $this->emptyBoxes[] = ['lineIndex' => $lineIndex, 'columIndex' => $emptyBoxIndex];
                }
            } 
        }
    }

    private function checkline(int $lineIndex): bool
    {
        $line = $this->__getLines()[$lineIndex];

        foreach(GRID::VALID_ELEMENT as $index => $sign){
            if (strchr($line, $sign) !== false)
                return false;
        }
        return true;
    }

    private function checkColumn(int $columIndex): bool
    {
        $colum = $this->colum[$columIndex];

        foreach(GRID::VALID_ELEMENT as $index => $sign){
            if (strchr($colum, $sign) !== false)
                return false;
        }
        return true;
    }

    private function checkSquare(int $squareIndex): bool
    {
        $square = $this->squares[$squareIndex];

        foreach(GRID::VALID_ELEMENT as $index => $sign){
            if (strchr($square, $sign) !== false)
                return false;
        }
        return true;
    }

    ////////////////////////////////////////
    ///////////////////////////////////////
    //////////////////////////////////////
    /////////////////////////////////////
    private function moveIsValid(int $lineIndex, int $columIndex, string $sign): bool
    {
        $line = $this->__getLines()[$lineIndex];
        $column = $this->__getColumns()[$columIndex];

        return !strstr($line, $sign) && !strstr($column, $sign);
        //
        //
        //

         //&& !strstr($this->square[$lineIndex], $sign);reqork de la funtion des square pour obtenir l'index du carree
    }

    private function doNextMove(): void
    {
        $currentEmptyBoxIndexLine = $this->emptyBoxes[$this->indexEmptyBox]['lineIndex'];
        $currentEmptyBoxIndexColumn = $this->emptyBoxes[$this->indexEmptyBox]['columIndex'];

        if (isset($this->emptyBoxes[$this->indexEmptyBox]['previousSolutionIndex'])){
            $previousSolutionIndex = $this->emptyBoxes[$this->indexEmptyBox]['previousSolutionIndex'] + 1;
            $this->grid[$currentEmptyBoxIndexLine][$currentEmptyBoxIndexColumn] = Grid::EMPTY_BOX;
        } else {
            $previousSolutionIndex = 0;
        }
        for($index = $previousSolutionIndex; $index < 9; $index++){
            $currentSign = Grid::VALID_ELEMENT[$index];
            if (stripos($this->__getLines()[$currentEmptyBoxIndexLine], $currentSign) === false){
                $this->emptyBoxes[$this->indexEmptyBox]['value'] = $currentSign;
                $this->emptyBoxes[$this->indexEmptyBox]['previousSolutionIndex'] = $index;
                $this->setIndexToNextEmptyBox();
                if (!$this->moveIsValid($currentEmptyBoxIndexLine, $currentEmptyBoxIndexColumn, Grid::VALID_ELEMENT[$index])){
                    $this->setIndexToPreviousEmptyBox();
                    return;
                } else {
                    $this->grid[$currentEmptyBoxIndexLine][$currentEmptyBoxIndexColumn] = $currentSign;
                }
            }
        }
    }

    private function gridIsResolved(): bool
    {
        // check all lines validity
        for ($lineIndex = 0; $lineIndex < 9; $lineIndex++){
            if (!$this->checkLine($lineIndex)){
                return false;
            }
        }
        // check all colums validity
        for ($columIndex = 0; $columIndex < 9; $columIndex++){
            if (!$this->checkColumn($columIndex)){
                return false;
            }
        }
        //check all square validity
        for ($squareIndex = 0; $squareIndex < 9; $squareIndex++){
            if (!$this->checksquare($squareIndex)){
                return false;
            }
        }
        return  true;
    }

    public function resolveSudoku(): void
    {
        while($this->indexEmptyBox < count($this->emptyBoxes) && !$this->gridIsResolved()) {
           $this->doNextMove();
        }
    }

    public function displayGridResult(): void
    {
        $grid = $this->grid;

        foreach($grid as $indexLine => $line){
            foreach($line as $indexColumn => $column) {
                echo $grid[$indexLine][$indexColumn];
                if ($indexLine % 3 === 2 && $indexColumn === 8 && $indexLine < 8){
                    echo PHP_EOL . GRID::COLUM_SEPARATOR . PHP_EOL;
                    continue;
                } 
                if ($indexColumn % 3 === 2 &&$indexColumn === 8){
                    echo PHP_EOL;
                } elseif ($indexColumn % 3 === 2){
                    echo GRID::LINE_SEPARATOR;
                }
            }
        }
    }
}

if (!$argv[1]) {
    throw new Error("This program take one file name in parameter.");
}

$fileName = $argv[1];

if (!file_exists($fileName)){
    throw new Error("This file do not exist.");
}

$gridString = file_get_contents($fileName, 'r');

if (!$gridString || !strlen($gridString)){
    throw new Error("This file is not readable.");
}

$gridArray = explode(PHP_EOL, $gridString);
$gridObject = new Grid($gridArray);

$gridObject->resolveSudoku();
$gridObject->displayGridResult();
