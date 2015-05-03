<?php 

class text {

    public static function contains($string, $substring = false) {

        if($substring && strpos($string, $substring) !== false) {

            return true;
        }

        return false;
    }

    public static function count($string, $selector = false) {

    	switch ($selector) {
    		case 'words': 
    			return str_word_count($string);
    		default:
    			if(self::substring($selector, 0, 1) === ':') {
    				return substr_count($string, self::substring($selector, 1));
    			}
    			return self::length($string);
    	}
    }

    public static function length($string) {

    	return strlen($string);
    }

    public static function lowercase($string, $selector = false) {

    	switch ($selector) {
    		case 'first': 
    			return lcfirst($string);
    		case 'words':
    			return lcwords($string);
    		default:
    			return strtolower($string);
    	}
    }

    public static function replace($string, $find, $replaceWith = '') {

        return str_replace($find, $replaceWith, $string);
    }

    public static function reverse($string) {

    	return strrev($string);
    }

    public static function shuffle($string) {

    	return str_shuffle($string);
    }

    public static function strip($string) {

    	return trim($string);
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

        if(!empty($lipsum)) {

            return $lipsum;
        }

        return 'Random text could not be loaded...';
    }

    public static function substring($string, $firstIndex = 0, $maxStringLength = false) {

    	if(!$maxStringLength) {

    		$maxStringLength = (self::length($string) - $firstIndex);
    	}

    	return substr($string, $firstIndex, $maxStringLength);
    }

    public static function uppercase($string, $selector = false) {

    	switch ($selector) {
    		case 'first': 
    			return ucfirst($string);
    		case 'words':
    			return ucwords($string);
    		default:
    			return strtoupper($string);
    	}
    }
	
}
