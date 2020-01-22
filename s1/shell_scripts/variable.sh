#!/bin/bash

BIRTHDATE="Jan 1, 2000"
Presents=10
BIRTHDAY=`date -j -f '%b %d, %Y' "$BIRTHDATE" +%A`

echo "I was born on $BIRTHDAY the $BIRTHDATE";