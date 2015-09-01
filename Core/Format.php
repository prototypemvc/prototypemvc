<?php

namespace Pmvc\Core;

use \Pmvc\Core\Data;
use \Pmvc\Core\Validate;

class Format {

    /** 
    * Format array into json.
    * @param array of data to be formatted 
    * @param boolean weither to prettify json string or not
    * @return string in json format
    */
    public static function arrayToJson($array = false, $pretty = false) {

        if ($array && Validate::isArray($array)) {

            if ($pretty === true) {

                return json_encode($array, JSON_PRETTY_PRINT);
            }

            return json_encode($array);
        }

        return false;
    }

    /** 
    * Format array into string.
    * @param array of data to be formatted 
    * @param string delimiter on which the string will be imploded 
    * @return string of imploded array 
    */
    public static function arrayToString($array = false, $delimiter = ' ') {

        if ($array && Validate::isArray($array)) {

            return implode($delimiter, $array);
        }

        return false;
    }

    /** 
    * Format csv into array.
    * @param string of csv to be formatted 
    * @return array of formatted csv values 
    */
    public static function csvToArray($csv = false) {

        if ($csv) {

            return str_getcsv($csv);
        }

        return false;
    }

    /** 
    * Format json into array.
    * @param string in json format 
    * @return array of json values and keys 
    */
    public static function jsonToArray($json = false) {

        if ($json && Validate::isJson($json)) {

            $object = json_decode($json);
            return self::objectToArray($object);
        }

        return false;
    }

    /** 
    * Format string into array.
    * @param string of data to be formatted 
    * @param string delimiter on which the string will explode   
    * @return array of exploded string 
    */
    public static function stringToArray($string = false, $delimiter = ' ') {

        if ($string && Validate::isString($string)) {

            return explode($delimiter, $string);
        }

        return false;
    }

    /** 
    * Format anything into boolean. 
    * @param mixed input 
    * @return boolean 
    */
    public static function toBool($input = false) {

        return self::toBoolean($input);
    }

    /** 
    * Format anything into boolean. 
    * @param mixed input 
    * @return boolean 
    */
    public static function toBoolean($input = false) {

        if ($input) {

            $boolean = (bool) $input;
            if (Validate::isBoolean($boolean)) {

                return $boolean;
            }
        }

        return false;
    }

    /** 
    * Format anything into float. 
    * @param mixed input 
    * @return float 
    */
    public static function toFloat($input = false) {

        if ($input && Validate::isNumber($input)) {

            $float = (float) $input;
            if (Validate::isFloat($float)) {

                return $float;
            }
        }

        return false;
    }

    /** 
    * Format anything into integer. 
    * @param mixed input 
    * @return integer 
    */
    public static function toInt($input = false) {

        return self::toInterger($input);
    }

    /** 
    * Format anything into integer. 
    * @param mixed input 
    * @return integer 
    */
    public static function toInteger($input = false) {

        if ($input && Validate::isNumber($input)) {

            $integer = (int) $input;
            if (Validate::isInteger($integer)) {

                return $integer;
            }
        }

        return false;
    }

    /** 
    * Format anything into json. 
    * @param mixed input 
    * @param boolean weither to prettify json string or not
    * @return string in json format 
    */
    public static function toJson($input = false, $pretty = false) {

        if ($input) {

            switch (Data::type($input)) {
                case 'array':
                    $json = self::arrayToJson($input, $pretty);
                    break;
                case 'object':
                    $json = self::objectToJson($input, $pretty);
                    break;
                default:
                    $json = false;
                    break;
            }

            if (Validate::isJson($json)) {

                return $json;
            }
        }

        return false;
    }

    /** 
    * Format anything into string. 
    * @param mixed input 
    * @return string 
    */
    public static function toString($input = false) {

        if ($input) {

            $string = (string) $input;
            if (Validate::isString($string)) {

                return $string;
            }
        }

        return false;
    }

    /** 
    * Format object into array.
    * @param object of data to be formatted 
    * @return array 
    */
    public static function objectToArray($object = false) {

        if ($object && Validate::isObject($object)) {

            return self::objectToArrayRecursive($object);
        }

        return false;
    }

    /** 
    * Format object into array recursively.
    * @param object of data to be formatted 
    * @return array 
    * Thanks to: http://ben.lobaugh.net/blog/567/php-recursively-convert-an-object-to-an-array
    */
    private static function objectToArrayRecursive($object) {
        if (is_object($object))
            $object = (array) $object;
        if (is_array($object)) {
            $new = array();
            foreach ($object as $key => $val) {
                $new[$key] = self::objectToArrayRecursive($val);
            }
        } else
            $new = $object;
        return $new;
    }

    /** 
    * Format array into object.
    * @param array of data to be formatted 
    * @return object 
    */
    public static function arrayToObject($array = false) {

        if ($array && Validate::isArray($array)) {

            $object = new \stdClass();

            foreach ($array as $key => $value) {

                $object->$key = $value;
            }

            return $object;
        }

        return false;
    }

    /** 
    * Format object into json.
    * @param object of data to be formatted 
    * @return string in json format  
    */
    public static function objectToJson($object = false, $pretty = false) {

        if ($object && Validate::isObject($object)) {

            $array = self::objectToArray($object);
            return self::arrayToJson($array, $pretty);
        }

        return false;
    }

    /** 
    * Format anything into object. 
    * @param mixed input 
    * @return object 
    */
    public static function toObject($input = false) {

        if ($input) {

            switch (Data::type($input)) {
                case 'array':
                    $object = self::arrayToObject($input);
                    break;
                case 'object':
                    $object = $input;
                    break;
            }

            if (Validate::isObject($object)) {

                return $object;
            }
        }

        return false;
    }

    /** 
    * Format anything into array. 
    * @param mixed input 
    * @return array 
    */
    public static function toArray($input = false) {

        if ($input) {

            switch (Data::type($input)) {
                case 'array':
                    $array = $input;
                    break;
                case 'object':
                    $array = self::arrayToObject($input);
                    break;
            }

            if (Validate::isObject($input)) {

                return $input;
            }
        }

        return false;
    }

}
