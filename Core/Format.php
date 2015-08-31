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

    public static function toBool($input = false) {

        return self::toBoolean($input);
    }

    public static function toBoolean($input = false) {

        if ($input) {

            $boolean = (bool) $input;
            if (Validate::isBoolean($boolean)) {

                return $boolean;
            }
        }

        return false;
    }

    public static function toFloat($input = false) {

        if ($input && Validate::isNumber($input)) {

            $float = (float) $input;
            if (Validate::isFloat($float)) {

                return $float;
            }
        }

        return false;
    }

    public static function toInt($input = false) {

        return self::toInterger($input);
    }

    public static function toInteger($input = false) {

        if ($input && Validate::isNumber($input)) {

            $integer = (int) $input;
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

    public static function toString($input = false) {

        if ($input) {

            $string = (string) $input;
            if (Validate::isString($string)) {

                return $string;
            }
        }

        return false;
    }

    public static function objectToArray($object = false) {

        if ($object && Validate::isObject($object)) {

            return self::objectToArrayRecursive($object);
        }

        return false;
    }

    // source: http://ben.lobaugh.net/blog/567/php-recursively-convert-an-object-to-an-array
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
