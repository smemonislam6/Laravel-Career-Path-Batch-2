<?php
    #Find the maximum among an unlimited number of values.
    $number = [5, 10, 50, 60, 70, 30, 20];

    function maximum(array $arr): int
    {
        $max = $arr[0];
        foreach($arr as $key => $value)
        {
            if($max < $arr[$key]){
                $max = $value;
            }
        }

        return $max;
    }

    echo maximum($number);
