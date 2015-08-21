<?php

namespace Pmvc\Core;

class Text {

    public static function contains($string = false, $substring = false) {

        if ($substring && $substring && strpos($string, $substring) !== false) {

            return true;
        }

        return false;
    }

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

    public static function hash($string = false) {

        if($string) {

            return sha1($string);
        }

        return false;
    }

    public static function length($string = false) {

        if ($string) {

            return strlen($string);
        }

        return false;
    }

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

    public static function replace($string = false, $find = false, $replaceWith = '') {

        if ($string && $find) {

            return str_replace($find, $replaceWith, $string);
        }

        return false;
    }

    public static function reverse($string = false) {

        if ($string) {

            return strrev($string);
        }


        return false;
    }

    public static function shuffle($string = false) {

        if ($string) {

            return str_shuffle($string);
        }

        return false;
    }

    public static function strip($string = false) {

        if ($string) {

            return trim($string);
        }

        return false;
    }

    // Stephen Watkins - stackoverflow
    public static function random($length = 10, $allowedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {

        $charactersLength = self::length($allowedCharacters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $allowedCharacters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // Charalambos Tsangarides - https://blog.ergatides.com
    // LET OP is nog gevoelig voor geen internet of error tijdens laden, moet afgehandeld worden
    public static function loremIpsum($amount = 3, $what = 'paras', $startWithLoremIpsum = 0) {

        $lipsum = simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$startWithLoremIpsum")->lipsum;

        if (!empty($lipsum)) {

            return $lipsum;
        }

        return 'Random text could not be loaded...';
    }

    public static function substring($string = false, $firstIndex = 0, $maxStringLength = false) {

        if ($string) {

            if (!$maxStringLength) {

                $maxStringLength = (self::length($string) - $firstIndex);
            }

            return substr($string, $firstIndex, $maxStringLength);
        }

        return false;
    }

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
