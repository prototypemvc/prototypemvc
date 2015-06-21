<?php

namespace Pmvc\Core;

use \Pmvc\Core\Data;
use \Pmvc\Core\Validate;

class Format {

    public static function arrayToJson($array = false, $pretty = false) {

        if ($array && Validate::isArray($array)) {

            if ($pretty === true) {

                return json_encode($array, JSON_PRETTY_PRINT);
            }

            return json_encode($array);
        }

        return false;
    }

    public static function arrayToString($array = false, $delimiter = ' ') {

        if ($array && Validate::isArray($array)) {

            return implode($delimiter, $array);
        }

        return false;
    }

    public static function csvToArray($csv = false) {

        if ($csv) {

            return str_getcsv($csv);
        }

        return false;
    }

    public static function jsonToArray($json = false) {

        if ($json && Validate::isJson($json)) {

            $object = json_decode($json);
            return self::objectToArray($object);
        }

        return false;
    }

    public static function stringToArray($string = false, $delimiter = ' ') {

        if ($string && Validate::isString($string)) {

            return explode($delimiter, $string);
        }

        return false;
    }

    public static function toBool($var = false) {

        return self::toBoolean($var);
    }

    public static function toBoolean($var = false) {

        if ($var) {

            $boolean = (bool) $var;
            if (Validate::isBoolean($boolean)) {

                return $boolean;
            }
        }

        return false;
    }

    public static function toFloat($var = false) {

        if ($var && Validate::isNumber($var)) {

            $float = (float) $var;
            if (Validate::isFloat($float)) {

                return $float;
            }
        }

        return false;
    }

    public static function toInt($var = false) {

        return self::toInterger($var);
    }

    public static function toInteger($var = false) {

        if ($var && Validate::isNumber($var)) {

            $integer = (int) $var;
            if (Validate::isInteger($integer)) {

                return $integer;
            }
        }

        return false;
    }

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

    public static function toString($var = false) {

        if ($var) {

            $string = (string) $var;
            if (Validate::isString($string)) {

                return $string;
            }
        }

        return false;
    }

    public static function objectToArray($object) {

        if ($object && Validate::isObject($object)) {

            //return (array) $object;
            return self::objectToArrayRecursive($object);
        }

        return false;
    }

    // source: http://ben.lobaugh.net/blog/567/php-recursively-convert-an-object-to-an-array
    public static function objectToArrayRecursive($obj) {
        if (is_object($obj))
            $obj = (array) $obj;
        if (is_array($obj)) {
            $new = array();
            foreach ($obj as $key => $val) {
                $new[$key] = self::objectToArrayRecursive($val);
            }
        } else
            $new = $obj;
        return $new;
    }

    public static function arrayToObject($array = false) {

        if ($array && Validate::isArray($array)) {

            $object = new stdClass();

            foreach ($array as $key => $value) {

                $object->$key = $value;
            }

            return $object;
        }

        return false;
    }

    public static function objectToJson($object = false, $pretty = false) {

        if ($object && Validate::isObject($object)) {

            $array = self::objectToArray($object);
            return self::arrayToJson($array, $pretty);
        }

        return false;
    }

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
