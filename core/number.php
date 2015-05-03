<?php 

class number {

    public static function average($array, $decimals = 2) {

        if(is_array($array)) {

            return self::round((array_sum($array) / count($array)), $decimals); 
        }

        return false;
    }

    public static function max($array, $decimals = 3) {

        if(is_array($array)) {

            return self::round(max($array), $decimals);
        }

        return false;
    }

    public static function min($array, $decimals = 3) {

        if(is_array($array)) {

            return self::round(min($array), $decimals);
        }

        return false;
    }

    public static function percentage($number1, $number2, $decimals = 2) {

        return self::round(($number1 / $number2) * 100, $decimals);
    }

    public static function random($min = 1, $max = 10000000) {

        return mt_rand($min, $max);
    }

    public static function round($number, $decimals = false) {

        return number_format((float)$number, $decimals);
    }

    public static function sum($number1, $number2, $operator = '+', $decimals = 3) {

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

        return false;
    }

    public static function total($array) {

        if(is_array($array)) {

            return array_sum($array);
        }

        return false;
    }
	
}
