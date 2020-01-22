#!/bin/bash

arg1="The first argument is : $1\n";
arg2="The Second argument is : $2\n";
arg3="The third argument is : $3\n";
arg4="The fourth argument is : $4\n";

if [ ! "$1" -a ! "$2" -a ! "$3" -a ! "$4" ];then
 echo "Aucun argument n'a été saisi";
 exit;
fi

echo $arg1;
echo $arg2;
echo $arg3;
echo $arg4;