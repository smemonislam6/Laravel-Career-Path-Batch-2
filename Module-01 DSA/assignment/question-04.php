<?php

    /*
        Print the following pattern based on the given number n (can be any number). 
        Sample input: 5 
        Sample output: 
            *
           ***
          *****
         *******
        *********
   */


    $row = 5;

    function pyramid(int $row)
    {
        for($i = 1; $i <=$row; $i++)
        {
            for($j = 1; $j <= $row; $j++)
            {
                if( $j >= $row - ($i - 1) && $j <= $row + ($i - 1)){
                    echo "*";
                }else{
                    echo " ";
                }               
            }
            echo "\n";
        }
    }

    pyramid($row);