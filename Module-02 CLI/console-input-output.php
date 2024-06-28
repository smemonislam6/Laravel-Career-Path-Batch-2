#!/usr/bin/env php
<?php
    // Prompt the user to enter a value and store it in $value
    $value = readline("Enter a value: ");

    // Output the type and value of $value using var_dump()
    var_dump($value);

    // Read two values from standard input (stdin) and store them in $a and $b
    fscanf(STDIN, "%d %s", $a, $b);

    // Output the type and value of $a and $b using var_dump()
    var_dump($a, $b);

