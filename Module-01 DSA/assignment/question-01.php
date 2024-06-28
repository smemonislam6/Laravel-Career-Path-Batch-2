<?php

    /*
        Problem 1:
        Given a list of integers, find the minimum of their absolute values. 
        Note:
        'Absolute values' means the non-negative value without regard to its sign. For example, the Absolute value of 123 is 123, and the Absolute value of -123 is also 123. 

        Sample input 1:
        10 12 15 189 22 2 34
        Sample output 1: 
        2

        Sample input 2:
        10 -12 34 12 -3 123
        Sample output 2:
        3
    */

    # Solution 01
    $number = [10, 12, 15, 189, 22, 2, 34];
    function findMinimumNumber(array $numbers): int
    {
        $minNumber = $numbers[0];
        foreach($numbers as $number)
        {
            $number = abs($number);
            if( $number <  $minNumber)
            {
                $minNumber = $number;
            }
        }
        return $minNumber;
    }
   echo findMinimumNumber($number);

   echo "<br>";


    # Solution 02

    
    $number = "10 -12 34 12 -3 123";
    function findMinimumNumber02(string $numbers): int
    {
        $numbers = explode(" ", $numbers);
        $minNumber = $numbers[0];
        foreach($numbers as $number)
        {
            $number = abs($number);
            if( $number <  $minNumber)
            {
                $minNumber = $number;
            }
        }
        return $minNumber;
    }

    echo findMinimumNumber02($number);

    echo "<br>";

    # Solution 03
    $number = [10, 12, 15, 189, 22, 2, 34];

    function findMinimumNumber03(array $numbers)
    {
        $minNumber = array_reduce($numbers, function($carry, $item) {
            return $carry === null || $item < $carry ? $item : $carry;
        }, null);

        return $minNumber;
    }

    findMinimumNumber03($number);
