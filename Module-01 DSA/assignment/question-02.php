<?php

/*
    Problem 2:
    Given a few paragraphs in a file, read the file and count how many words are there. 
    For example, if there is a file with the following contents:

    Nunc ex lorem, ullamcorper ut eleifend ac, pellentesque non dolor.  

    You need to output: 10

    Because there are 10 words. 
    Note: There can be multiple paragraphs. You need to count all of the words from all of the paragraphs. 
    You need to read the data from a file. 
*/

$filePath = __DIR__ . '/text.txt';
$text = file_get_contents($filePath);

# Solution 01
echo str_word_count($text);

echo "<br>";

# Solution 02
function customWordCount(string $text): int
{
    $length = strlen($text);
    $wordCount = 0;
    $inWord = false;

    for ($i = 0; $i < $length; $i++) {
        $char = $text[$i];
        
        if (($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z') || ($char >= '0' && $char <= '9') || $char == '_') {
            
            if (!$inWord) {
                $wordCount++;
                $inWord = true;
            }
        } else {
            $inWord = false;
        }
    }

    return $wordCount;
}

echo customWordCount($text);