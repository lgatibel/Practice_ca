#!/bin/bash

a=(3 5 8 10 6)
b=(6 5 4 12)
c=(14 7 5 7)

# echo ${a[@]}
# echo ${b[@]}
# echo ${c[@]}


#initialise all variable for comparison
indexA=0
indexB=0

lengthA=${#a[@]}
lengthB=${#b[@]}

aAndB=()
indexAandB=0

#coparison of array a And b
while [[ $indexA -lt $lengthA ]]; do
    indexB=0
    while [[ $indexB -lt $lengthB ]]; do
        if [[ ${a[$indexA]} -eq  ${b[$indexB]} ]]; then
            aAndB[$indexAandB]="${a[$indexA]}"
            indexAandB=$(($indexAAndB + 1))
        fi
        indexB=$(($indexB + 1))
    done
    indexA=$(($indexA + 1))
done

#initialise all variable for comparison
aAndBAndC=()

indexAAndB=0
indexAAndBAndC=0
indexC=0

lenghtAAndB=${#aAndB[@]}
lengthC=${#c[@]}

#coparison of array a And b And c
while [[ $indexAAndB -lt $lenghtAAndB ]]; do
    indexC=0
    while [[ $indexC -lt $lengthC ]]; do
        if [[ ${aAndB[$indexAAndB]} -eq  ${c[$indexC]} ]]; then
            aAndBAndC[$indexAAndBAndC]="${aAndB[$indexAAndB]}"
            indexAandBAndC=$(($indexAAndB + 1))
        fi
        indexC=$(($indexC + 1))
    done
    indexAAndB=$(($indexAAndB + 1))
done

#print result
echo "${aAndBAndC[@]}"
