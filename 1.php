<?php
class Palindrome
{
    public static function isPalindrome($word)
    {
        $low_word = strtolower($word);
        $char_array = str_split(strtolower($word));
        $reverce_char_array = array_reverse($char_array);
        $reverce_word = implode($reverce_char_array);

        if($low_word === $reverce_word)
            return true;
        else
            return false;
    }
}

var_dump(Palindrome::isPalindrome('Deleveled'));