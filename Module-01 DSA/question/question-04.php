<?php

    # Question 04 → How can you reverse integers such as 54321, -54321, and 100 in PHP?
    $number = -12345;

    # Solution 01
    function reverseInteger01(int $number)
    { 
        $isNegative = $number < 0;

        $number = abs($number);

        $reverseNumber = reverseDigit($number);
 
        return $isNegative ? - $reverseNumber : $reverseNumber ;
    }

    // echo reverseInteger01($number);

    function reverseDigit($number)
    {
        $reverse = 0;

        while($number > 0)
        {
            $getLastDigit = $number % 10;
            $number = (int)($number / 10);

            $reverse = $reverse * 10 +  $getLastDigit;
        }

        return $reverse;
    }


    # Solution 02

    $number = 100;
    function reverseInteger02($number)
    {

        $isNegative = $number < 0;
        $number = abs($number);
        $number = (string) $number;

        $number = strrev($number);
        $number = (int) $number;

       return $isNegative ? -$number : $number;
    }

    echo reverseInteger02($number);