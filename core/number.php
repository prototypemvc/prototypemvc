<?php 

class number {

    public static function average($array = false, $decimals = 2) {

        if($array && is_array($array)) {

            return self::round((array_sum($array) / count($array)), $decimals); 
        }

        return false;
    }

    public static function max($array = false, $decimals = 3) {

        if($array && is_array($array)) {

            return self::round(max($array), $decimals);
        }

        return false;
    }

    public static function min($array = false, $decimals = 3) {

        if($array && is_array($array)) {

            return self::round(min($array), $decimals);
        }

        return false;
    }

    public static function percentage($number1 = false, $number2 = false, $decimals = 2) {

        if($number1 && $number2) {

            return self::round(($number1 / $number2) * 100, $decimals);
        }

        return false;
    }

    public static function random($min = 1, $max = 10000000) {

        return mt_rand($min, $max);
    }

    public static function round($number = false, $decimals = false) {

        if($number) {

            return number_format((float)$number, $decimals);
        }

        return false;
    }

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

    public static function total($array = false) {

        if($array && is_array($array)) {

            return array_sum($array);
        }

        return false;
    }
	
}
