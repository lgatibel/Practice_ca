#!/bin/bash

#initialise variables
filename=$0
badFilename="test_filename"
filepath="../shell_scripts"
badFilepath="test_filepath"

#test if filename exist
if [[ -e $filename ]]; then
    echo "the file $filename exist"
fi

#test if badFilename exist
if [[ ! -e $badFilename ]]; then
    echo "the file $badFilename do not exist"
fi

#test if filepath exist
if [[ -d $filepath ]]; then
    echo "the folder $filepath exist"
fi

#test if badFilepath exist
if [[ ! -d $badFilepath ]]; then
    echo "the folder $badFilepath do not exist"
fi