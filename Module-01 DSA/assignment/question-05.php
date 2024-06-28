<?php 
    /*
        Problem 5:
        Given an integer n, find the sum of the digits of the integer.

        Sample input 1:
        62343
        Sample output 1: 
        18

        Sample input 2:
        1000
        Sample output 2: 
        1
    */

    $number = 62343;

    # Solution 01
    function sum(int $numbers): int
    {
        $number = abs($numbers);

        $sum = 0;

        while($number > 0)
        {
            $lastDigit = $number % 10;
            $number = (int) ($number / 10);

            $sum += $lastDigit;
        }

        return $sum;
    }

   echo sum($number);

   echo "<br>";
   
    # Solution 02

    function sum02(int $numbers): int
    {
        $numbers = str_split(abs($numbers));
        $total = array_sum($numbers);

        return $total;
    }

    echo sum02($number);