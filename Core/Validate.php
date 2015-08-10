<?php

namespace Pmvc\Core;

use \Pmvc\Core\Data;
use \Pmvc\Helpers\Date;

class validate {

    public static function isArray($array = false) {

        if ($array && Data::type($array) === 'array') {

            return true;
        }

        return false;
    }

    public static function isBool($input = false) {

        return self::isBoolean($input);
    }

    public static function isBoolean($input = false) {

        if ($input && is_bool($input)) {

            return true;
        }

        return false;
    }

    public static function isDate($input = false, $format = 'Y-m-d H:i:s') {

        if ($input && Date::isDate($input)) {

            return true;
        }

        return false;
    }

    public static function isMac($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_MAC) === false) {

            return true;
        }

        return false;
    }

    public static function isEmail($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_EMAIL) === false) {

            return true;
        }

        return false;
    }

    public static function isFloat($input = false) {

        if ($input && is_float($input)) {

            return true;
        }

        return false;
    }

    public static function isInt($input = false) {

        return self::isInteger($input);
    }

    public static function isInteger($input = false) {

        if ($input && is_int($input)) {

            return true;
        }

        return false;
    }

    public static function isIp($input = false) {

        if ($input && !filter_var($input, FILTER_VALIDATE_IP) === false) {

            return true;
        }

        return false;
    }

    public static function isJson($string = false) {

        if ($string && is_object(json_decode($string))) {

            return true;
        }

        return false;
    }

    public static function isLength($input = false, $min = 0, $max = false) {

        if ($input && strlen($input) >= $min) {

            if (!$max || strlen($input) <= $max) {

                return true;
            }
        }

        return false;
    }

    public static function isNumber($input = false) {

        return self::isNumeric($input);
    }

    public static function isNumeric($input = false) {

        if ($input && is_numeric($input)) {

            return true;
        }

        return false;
    }

    public static function isObject($input = false) {

        if ($input && is_object($input)) {

            return true;
        }

        return false;
    }

    public static function isString($input = false) {

        if ($input && is_string($input)) {

            return true;
        }

        return false;
    }

    public static function isType($input = false, $type = false) {

        if ($input && $type && Data::type($input) == $type) {

            return true;
        }

        return false;
    }

    public static function isUrl($input) {

        if ($input && !filter_var($input, FILTER_VALIDATE_URL) === false) {

            return true;
        }

        return false;
    }

}
