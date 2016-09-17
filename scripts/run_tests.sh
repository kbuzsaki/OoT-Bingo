#!/bin/sh

TEST_OUTPUT_DIR="tests"
TEMP_FILE=".testoutput"

for mode_dir in $(ls $TEST_OUTPUT_DIR); do
    mode=$mode_dir
    echo "testing mode '$mode'"

    passed=0
    failed=0
    for test_file in $(ls $TEST_OUTPUT_DIR/$mode_dir); do
        seed=$(echo "$test_file" | cut -d'.' -f 1)
        ./generator $seed $mode > $TEMP_FILE

        cmp $TEMP_FILE $TEST_OUTPUT_DIR/$mode_dir/$test_file > /dev/null
        return_code="$?"
        if [ "$return_code" == "0" ]; then
            passed=$((passed + 1))
            echo "$test_file passed!"
        else
            failed=$((failed + 1))
            echo "$test_file Failed :("
        fi
    done

    echo ""
    echo "$passed passed"
    echo "$failed failed"
    echo ""
done

