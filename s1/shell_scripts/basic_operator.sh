#!/bin/bash

#assign number of fruit
numberOfPineapple=1
numberOfBanana=2
numberOfWatermelon=3

#assign cost of fruit
pinenapplePrice=12
bananaPrice=28
watermelonPrice=20

#calculate the total cost
TOTAL=$(($numberOfPineapple * $pinenapplePrice + \
 $numberOfBanana * $bananaPrice + \
  $numberOfWatermelon * $watermelonPrice ))

#print the total cost
echo "Total Cost is $TOTAL"