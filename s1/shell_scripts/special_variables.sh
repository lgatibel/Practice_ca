#!/bin/bash

echo "$0 - The filename of the current script."
echo "$n - The Nth argument passed to script was invoked or function was called."
echo "$# - The number of argument passed to script or function."
echo "$@ - All arguments passed to script or function."
echo "$* - All arguments passed to script or function."
echo "$? - The exit status of the last command executed."
echo "$$ - The process ID of the current shell. For shell scripts, this is the process ID under which they are executing."
echo "$! - The process number of the last background command."