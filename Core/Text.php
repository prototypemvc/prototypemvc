<?php

namespace Prototypemvc\Core;

class Text {

    /** 
    * Check if the given string contains a specific substring. 
    * @param string full string 
    * @param string substring 
    * @return boolean 
    */
    public static function contains($string = false, $substring = false) {

        if ($substring && $substring && strpos($string, $substring) !== false) {

            return true;
        }

        return false;
    }

    /** 
    * Get string length, number of words or the occurences of specific word. 
    * @param string full string 
    * @param string selector 
    * @example count('hello world') - will return length of string which is 11 
    * @example count('hello world', 'words') - will return number of words which is 2 
    * @example count('hello world', ':hello') - will return number of occurences of string 'hello' which is 1 
    * @return boolean 
    */
    public static function count($string = false, $selector = false) {

        if ($string) {

            switch ($selector) {
                case 'words':
                    return str_word_count($string);
                default:
                    if (self::substring($selector, 0, 1) === ':') {
                        return substr_count($string, self::substring($selector, 1));
                    }
                    return self::length($string);
            }
        }

        return false;
    }

    /** 
    * Get hashed string.  
    * @param string full string 
    * @return string hashed string  
    */
    public static function hash($string = false) {

        if($string) {

            return sha1($string);
        }

        return false;
    }

    /** 
    * Get string length. 
    * @param string full string 
    * @return int length of string 
    */ 
    public static function length($string = false) {

        if ($string) {

            return strlen($string);
        }

        return false;
    }

    /** 
    * Get string in lowercase.  
    * @param string full string 
    * @return string in lowercase 
    */ 
    public static function lowercase($string = false, $selector = false) {

        if ($string) {

            switch ($selector) {
                case 'first':
                    return lcfirst($string);
                case 'words':
                    return lcwords($string);
                default:
                    return strtolower($string);
            }
        }

        return false;
    }

    /** 
    * Get string with specific substring replaced. 
    * @param string full string  
    * @param string substring to find and replace 
    * @param string replace with this value 
    * @return string trimmed 
    */ 
    public static function replace($string = false, $find = false, $replaceWith = '') {

        if ($string && $find) {

            return str_replace($find, $replaceWith, $string);
        }

        return false;
    }

    /** 
    * Get reversed string.   
    * @param string full string  
    * @return string reversed  
    */ 
    public static function reverse($string = false) {

        if ($string) {

            return strrev($string);
        }


        return false;
    }

    /** 
    * Get string shuffled.    
    * @param string full string  
    * @return shuffeld string 
    */ 
    public static function shuffle($string = false) {

        if ($string) {

            return str_shuffle($string);
        }

        return false;
    }

    /** 
    * Get trimmed string.   
    * @param string full string  
    * @return string trimmed 
    */ 
    public static function strip($string = false) {

        if ($string) {

            return trim($string);
        }

        return false;
    }

    /** 
    * Get a random string.  
    * Thanks Stephen Watkins : stackoverflow
    * @param int string legnth 
    * @param string allowed characters 
    * @return string generated random string 
    */ 
    public static function random($length = 10, $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {

        $charactersLength = self::length($allowedCharacters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $allowedCharacters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /** 
    * Get lorem ipsum text. 
    * Thanks Charalambos Tsangarides : https://blog.ergatides.com 
    * WARNING! Needs an internet connection. 
    * @param int number of 'what' 
    * @param string what 
    * @param int start with lorem ipsum? 
    * @return string lorem ipsum text  
    */ 
    public static function loremIpsum($amount = 3, $what = 'paras', $startWithLoremIpsum = 0) {

        $lipsum = simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$startWithLoremIpsum")->lipsum;

        if (!empty($lipsum)) {

            return $lipsum;
        }

        return 'Random text could not be loaded...';
    }

    /** 
    * Get substring.  
    * @param string full string 
    * @param int first index (starting point)
    * @param int max string length 
    * @return string substring 
    */ 
    public static function substring($string = false, $firstIndex = 0, $maxStringLength = false) {

        if ($string) {

            if (!$maxStringLength) {

                $maxStringLength = (self::length($string) - $firstIndex);
            }

            return substr($string, $firstIndex, $maxStringLength);
        }

        return false;
    }

    /** 
    * Get string in uppercase.  
    * @param string full string 
    * @return string in uppercase 
    */ 
    public static function uppercase($string = false, $selector = false) {

        if ($string) {

            switch ($selector) {
                case 'first':
                    return ucfirst($string);
                case 'words':
                    return ucwords($string);
                default:
                    return strtoupper($string);
            }
        }

        return false;
    }

}
