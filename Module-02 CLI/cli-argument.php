#!/usr/bin/env php
<?php

# 01. Way of Argument 
/* 
    $form   = $argv[1];
    $to     = $argv[2];

    for($i=$form; $i<=$to; $i++)
    {
        echo $i . PHP_EOL;
    } 
*/

# 02. Way o Argument.
/**
 * Command-line script to demonstrate argv usage in PHP.
 *
 * Usage:
 * php script.php <from> [<to>]
 *
 * Arguments:
 * <from> : Required. Starting value for the loop.
 * <to>   : Optional. Ending value for the loop.
 *          If not provided, the loop will only print the starting value.
 */

$longOptions = ['form:', 'to::'];

$options = getopt('', $longOptions);

print_r($options);
