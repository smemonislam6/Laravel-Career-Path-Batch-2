#!/usr/bin/env php
<?php


    $options = getopt('', ['min::', 'max::']);

    $min = $options['min'] ?? 1;
    $max = $options['max'] ?? 10;

    $number = rand($min, $max);


    while(true)
    {
        $guess_number = readline("Enter a guessing number: ");

        if($guess_number == $number)
        {
            printf("Yes, You are correct.");
            break;
        }else if($guess_number > $number)
        {
            printf("Enter a small number. \n");
        }
        else{
            printf("Enter a higher number. \n");
        }
    }