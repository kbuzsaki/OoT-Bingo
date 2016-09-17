#!/bin/sh

TEST_OUTPUT_DIR="test_data"

for mode_dir in $(ls $TEST_OUTPUT_DIR); do
    mode=$mode_dir
    for test_file in $(ls $TEST_OUTPUT_DIR/$mode_dir); do
        seed=$(echo "$test_file" | cut -d'.' -f 1)
        echo "rebuilding $mode_dir/$test_file"
        ./generator $seed $mode > $TEST_OUTPUT_DIR/$mode_dir/$test_file
    done
done
