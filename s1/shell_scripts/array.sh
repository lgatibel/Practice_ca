#!/bin/bash

#create variables
number=()
string=()
NAMES=(Toto Eric James)
NumberOfNames=${#NAMES[@]}

#assign values to number array
number[0]=1
number[1]=2
number[2]=3

#assign values to string array
string[0]="hello"
string[1]="world"

#print all value for the final result
echo ${number[@]};
echo ${string[@]};
echo ${NAMES[@]};
echo "The number of names listed in the NAMES array: $NumberOfNames"
echo "The second name on the NAMES list is: ${NAMES[1]}"