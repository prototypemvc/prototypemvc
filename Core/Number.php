<?php 

namespace Pmvc\Core;

use \Pmvc\Core\Validate;

class Number {

    /** 
    * Get the average value of a given array. 
    * @param array with values 
    * @param int number of decimals
    * @return int || float
    */
    public static function average($array = false, $decimals = 2) {

        if($array && Validate::isArray($array)) {

            return self::round((array_sum($array) / count($array)), $decimals); 
        }

        return false;
    }

    /** 
    * Get the heighest value of a given array. 
    * @param array with values 
    * @param int number of decimals
    * @return int || float
    */
    public static function max($array = false, $decimals = 3) {

        if($array && Validate::isArray($array)) {

            return self::round(max($array), $decimals);
        }

        return false;
    }

    /** 
    * Get the lowest value of a given array. 
    * @param array with values 
    * @param int number of decimals
    * @return int || float
    */
    public static function min($array = false, $decimals = 3) {

        if($array && Validate::isArray($array)) {

            return self::round(min($array), $decimals);
        }

        return false;
    }

    /** 
    * Get the percentage. 
    * @param float number part 
    * @param float number total
    * @param numbes of decimals 
    * @return int || float
    */
    public static function percentage($number1 = false, $number2 = false, $decimals = 2) {

        if($number1 && $number2) {

            return self::round(($number1 / $number2) * 100, $decimals);
        }

        return false;
    }

    /** 
    * Get a random numbers between two values
    * @param int min number 
    * @param int max number
    * @return int 
    */
    public static function random($min = 1, $max = 10000000) {

        return mt_rand($min, $max);
    }

    /** 
    * Get a round number.  
    * @example round(15, 2) - will return 15.00 
    * @example round(15.123, 2) - will return 15.12 
    * @param float number 
    * @param int number of decimals
    * @return int || float
    */
    public static function round($number = false, $decimals = false) {

        if($number) {

            return number_format((float)$number, $decimals);
        }

        return false;
    }

    /**
    * @deprecated ???
    */
    public static function sum($number1 = false, $number2 = false, $operator = '+', $decimals = 3) {

        if($number1 && $number2) {

            switch ($operator) {
                case '+':
                    return self::round(($number1 + $number2), $decimals);
                case '-':
                    return self::round(($number1 - $number2), $decimals);
                case '%':
                    return self::percentage($number1, $number2, $decimals);
                case '/':
                    return self::round(($number1 / $number2), $decimals);
            }
        }

        return false;
    }

    /** 
    * Get the sum total of a given array's values. 
    * @param array with values 
    * @return int || float
    */
    public static function total($array = false, $decimals = 2) {

        if($array && Validate::isArray($array)) {

            return self::round(array_sum($array), $decimals);
        }

        return false;
    }
	
}
