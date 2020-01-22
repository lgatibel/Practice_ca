#!/bin/bash

# `diff <(sort hello-world.sh) <(sort bash_trap.sh)`
diff <(cat hello-world.sh) <(cat bash_trap.sh)
echo "Diff beetween two files (works in terminal)\n\n"

echo "Hello, world!" | tee /tmp/hello.txt
echo "The file /tmp/hello.txt will contains the same message"
