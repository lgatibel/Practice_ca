#!/bin/bash

trap "echo Dont touch this key!" SIGINT SIGTERM
echo "it's going to run until you hit Ctrl+Z"
echo "hit Ctrl+C to be blown away!"

#infinite loop
while true;
do
    sleep 60
done
