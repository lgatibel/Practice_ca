#!/bin/bash

BIRTHDATE="Jan 1, 2000"
Presents=10
BIRTHDAY=`date -j -f '%b %d, %Y' "$BIRTHDATE" +%A`

echo "BIRTHDATE is correct, it is $BIRTHDATE"
echo "I have received $Presents presents"
echo "I was born on a $BIRTHDAY"