#!/bin/bash

#assign values to varibles
BIRTHDATE="Jan 1, 2000"
Presents=10
#assign a complexe value to birthday variable
BIRTHDAY=`date -j -f '%b %d, %Y' "$BIRTHDATE" +%A`

#print some sentences with the previous varibles
echo "BIRTHDATE is correct, it is $BIRTHDATE"
echo "I have received $Presents presents"
echo "I was born on a $BIRTHDAY"