<?php

/*
    Problem 3:
    Given a sentence, keep the order of the words same, but reverse the characters of each word. 
    For example, if the given sentence is: ‘I love programming’ 
    The result should be: ‘I evol gnimmargorp’

    Here the order of the words is the same as the given sentence, but the order of the characters in the words is reversed. 
*/

# Solution 01

$char = "I love programming";
function reverseCharacter(string $char)
{
    $words = explode(" ", $char);
    $reverseWords = "";
    foreach($words as $word)
    {
        $reverseWords .= strrev($word) . " ";
    }

    return $reverseWords;
}

echo reverseCharacter($char);

echo "<br>";

 # Solution 02
$char = "This is a test of a very long sentence that should still work correctly";
function reverseCharacter02(string $char)
{
    $words = explode(" ", $char);
    
    $reverseWords = array_map('strrev', $words);

    return implode(" ", $reverseWords);
}

echo reverseCharacter02($char);


