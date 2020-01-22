#!/bin/bash
# enter your function code here
function ENGLISH_CALC {
    #perform addition
    if [[ $2 = 'plus' ]]; then
        #assign operator
        OPERATION="+"
        #assign result
        RESULT=$(($1 + $3))
    #perform substraction
    elif [[ $2 = 'minus' ]]; then
        #assign operator
        OPERATION="-"
        #assign result
        RESULT=$(($1 - $3))
    #perform multiplication
    elif [[ $2 = 'times' ]]; then
        #assign operator
        OPERATION="*"
        #assign result
        RESULT=$(($1 * $3))
    else
        echo "Operator not recognise"
        #exit code
        exit
    fi
    #print result 
    echo "$1 $OPERATION $3 = $RESULT"
}

# testing code
ENGLISH_CALC 3 plus 5
ENGLISH_CALC 5 minus 1
ENGLISH_CALC 4 times 6