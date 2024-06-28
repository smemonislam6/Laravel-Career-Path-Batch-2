<?php
    # Find the maximum among three numbers


$testCases = [
    [30, 20, 20, "30 greater than 20 and 20"],          // Test case 1: num1 > num2 and num3
    [20, 30, 10, "30 greater than 20 and 10"],          // Test case 2: num2 > num1 and num3
    [10, 20, 30, "30 greater than 10 and 20"],          // Test case 3: num3 > num1 and num2
    [20, 20, 20, "All three numbers are equal"],        // Test case 4: All numbers are equal
    [30, 30, 20, "30 greater than 30 and 20"],          // Test case 5: num1 == num2 > num3
    [20, 30, 30, "30 greater than 20 and 30"],          // Test case 6: num2 == num3 > num1
    [30, 20, 30, "30 greater than 20 and 30"],          // Test case 7: num1 == num3 > num2
    [10, 10, 20, "20 greater than 10 and 10"],          // Test case 8: num3 > num1 == num2
    [0, -10, -20, "0 greater than -10 and -20"],        // Test case 9: Mixed with negative numbers, num1 > num2 and num3
    [-10, -20, -30, "-10 greater than -20 and -30"],    // Test case 10: All negative numbers, num1 > num2 and num3
];

function maximum(int $num1, int $num2, int $num3): string
{
    if ($num1 == $num2 && $num1 == $num3) {
        return "All three numbers are equal";
    }

    if ($num1 >= $num2 && $num1 >= $num3) {
        return "{$num1} greater than {$num2} and {$num3}";
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        return "{$num2} greater than {$num1} and {$num3}";
    } else {
        return "{$num3} greater than {$num1} and {$num2}";
    }
}

foreach ($testCases as $key => $test) {
    $result = maximum($test[0], $test[1], $test[2]);
    if ($result === $test[3]) {
        echo "Test case " . ($key + 1) . ": {$result} : Passed <br>";
    } else {
        echo "Test case " . ($key + 1) . ": {$result} : Failed (Expected: {$test[3]})<br>";
    }
}
?>
