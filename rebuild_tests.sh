#!/bin/sh

TEST_OUTPUT_DIR="tests"

for test_file in $(ls $TEST_OUTPUT_DIR); do
    seed=$(echo "$test_file" | cut -d'.' -f 1)
    echo "rebuilding $test_file"
    ./generator $seed > $TEST_OUTPUT_DIR/$test_file
done
