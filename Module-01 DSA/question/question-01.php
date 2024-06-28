<?php
    # Question 01: Find the maximum between two numbers

    $testCases = [
        [150, 150, "Two numbers are equal"],          // Test case 1: Equal numbers
        [200, 150, "200 greater than 150"],           // Test case 2: num1 > num2
        [150, 200, "200 greater than 150"],           // Test case 3: num2 > num1
        [-10, -20, "-10 greater than -20"],           // Test case 4: num1 > num2 with negative numbers
        [-20, -10, "-10 greater than -20"],           // Test case 5: num2 > num1 with negative numbers
        [0, 0, "Two numbers are equal"],              // Test case 6: Both numbers are zero
        [0, 100, "100 greater than 0"],               // Test case 7: num1 is zero
        [100, 0, "100 greater than 0"],               // Test case 8: num2 is zero
        [123456, 123456, "Two numbers are equal"],    // Test case 9: Large equal numbers
        [123456, 654321, "654321 greater than 123456"] // Test case 10: Large different numbers
    ];

    function maximum(int $num1, int $num2): string
    {
        $max = 0;
        if($num1 > $num2) {
            $max = "{$num1} greater than {$num2}";
        } else if($num1 < $num2) {
            $max = "{$num2} greater than {$num1}";
        }else{
            $max = "Two numbers are equal";
        }

        return $max;
    }

    foreach($testCases as $key => $test)
    {
       $result = maximum($test[0], $test[1]);
    
       if($result == $test[2])
       {
            echo "{$result}: Passed <br>";
       }else{
            echo "{$result}: Failed <br>";
       }
    }
