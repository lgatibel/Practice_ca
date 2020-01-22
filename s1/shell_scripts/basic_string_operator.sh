#!/bin/bash

#assign variable ISAY with string value
ISAY="Life is like a snowball. The important thing is \
 finding wet snow and a really long hill."

#replace the first snow word by foot
 ISAY1=${ISAY[@]/snow/foot}
 
 #print first sentence
 echo "Warren Buffett said:"
 echo $ISAY

#delete the last snow word
 ISAY2=${ISAY1[@]/snow}

#replace the word finding by getting
 ISAY3=${ISAY2[@]/finding/getting}

#print the thirs sentence
 echo "and I say:"

 #delete all characters after word wet
 ISAY4=${ISAY3[@]:0:59}
 #print the last sentence
 echo $ISAY4
